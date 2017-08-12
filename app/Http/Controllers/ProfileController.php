<?php

// Todo: Add logo upload

namespace App\Http\Controllers;

use Auth;
use Route;
use App\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'myProfiles', 'create', 'store',
            'edit', 'update'
        ]);
    }

    /**
     * Get the index of all profiles.
     *
     * @return $this
     */
    public function index()
    {
        $view = $this->getCurrentListType();

        return view('profiles.' . $view)->with([
            'profiles' => Profile::paginate(16)
        ]);
    }

    /**
     * Get the current list type to determine the view.
     *
     * @return string
     */
    private function getCurrentListType()
    {
        switch(Route::currentRouteName())
        {
            case 'guide':return 'cards';break;
            case 'guide.map':return 'map';break;
            case 'guide.list':return 'table';break;
        }
    }

    /**
     * List the current users profiles.
     *
     * @return $this
     */
    public function myProfiles()
    {
        return view('profiles.table')->with([
            'profiles' => Auth::user()->profiles
        ]);
    }

    /**
     * Create a profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $profile = new Profile();

        return view('profiles.manage.create')->with(['profile' => $profile]);
    }

    /**
     * Save a profile to the database.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProfileRequest $request)
    {
        $profile = Profile::create($request->all());

        Auth::user()->profiles()->attach($profile);

        flash('Het profiel toegevoegd.');

        return redirect(route('profile.list'));
    }
}
