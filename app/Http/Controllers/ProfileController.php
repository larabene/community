<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\UnauthorizedException;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'myProfiles',
            'create',
            'store',
            'edit',
            'update',
        ]);
    }

    /**
     * Get the index of all profiles.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function index(Request $request)
    {
        $routeName = Route::currentRouteName();

        $view = $this->getTemplateByRoute($routeName);
        $profiles = $this->getProfilesByRoute($request, $routeName);

        return view($view, [
            'profiles' => $profiles,
        ]);
    }

    /**
     * Display a company profile.
     *
     * @param Profile $profile
     *
     * @return $this
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', [
            'profile' => $profile,
        ]);
    }

    /**
     * Returns the (paginated) list of profiles based on the current route.
     *
     * @param Request $request
     * @param string  $routeName
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    private function getProfilesByRoute(Request $request, string $routeName)
    {
        $query = Profile::filter($request->all())->sorted();

        return $routeName === 'guide'
            ? $query->paginateFilter(9)
            : $query->get();
    }

    /**
     * Returns the template name based on the current route.
     *
     * @param string $routeName
     *
     * @return string
     */
    private function getTemplateByRoute(string $routeName)
    {
        static $map = [
            'guide'      => 'profiles.cards',
            'guide.map'  => 'profiles.map',
            'guide.list' => 'profiles.table',
        ];

        return $map[$routeName];
    }

    /**
     * List the current users profiles.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function myProfiles(Request $request)
    {
        return view('profiles.table')->with([
            'profiles' => $request->user()->profiles,
        ]);
    }

    /**
     * Create a profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('profiles.manage.create', [
            'profile' => new Profile(),
        ]);
    }

    /**
     * Save a profile to the database.
     *
     * @param ProfileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProfileRequest $request)
    {
        $user = $request->user();

        $profile = $user->profiles()->create($request->getValidInput());
        if($request->has('logo')) {
            $profile->addMediaFromRequest('logo')
                ->setName("$profile->slug avatar")
                ->setFileName($profile->slug . ".png")
                ->toMediaCollection('avatars');
        }

        if ($user->profiles()->count() === 1) {
            $user->profiles()->updateExistingPivot($profile->id, [
                'primary' => 1,
            ]);
        }

        flash('Het profiel toegevoegd.');

        return redirect()->route('profile.list');
    }

    /**
     * Edit an existing profile.
     *
     * @param Request $request
     * @param Profile $profile
     *
     * @return $this
     */
    public function edit(Request $request, Profile $profile)
    {
        $this->assertActionAllowed($request->user(), $profile);

        return view('profiles.manage.edit')->with(['profile' => $profile]);
    }

    /**
     * @param ProfileRequest $request
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->assertActionAllowed($request->user(), $profile);

        $profile->update($request->getValidInput());

        if($request->has('logo')) {
            $profile->clearMediaCollection('avatars');

            $profile->addMediaFromRequest('logo')
                ->setName("$profile->slug avatar")
                ->setFileName($profile->slug . ".png")
                ->toMediaCollection('avatars');
        }

        flash('Het bedrijfsprofiel is bijgewerkt', 'success');

        return redirect()->route('profile.list');
    }

    /**
     * Delete the logo.
     *
     * @param Profile $profile
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeLogo(Profile $profile)
    {
        $profile->clearMediaCollection('avatars');

        flash('Het logo is verwijderd.');

        return redirect()->route('profile.edit', [
            $profile->slug,
        ]);
    }

    /**
     * @param Request $request
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Profile $profile)
    {
        $this->assertActionAllowed($request->user(), $profile);

        $profile->delete();

        flash('Het bedrijfsprofiel is verwijderd.');

        return redirect()->route('profile.list');
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        try {
            return parent::callAction($method, $parameters);
        } catch (UnauthorizedException $e) {
            flash('Je hebt geen toegang tot dit profiel', 'error');

            return redirect()->route('profile.list');
        }
    }

    /**
     * @param User    $user
     * @param Profile $profile
     */
    private function assertActionAllowed(User $user, Profile $profile): void
    {
        if (! $user->profiles->contains($profile)) {
            throw new UnauthorizedException();
        }
    }
}
