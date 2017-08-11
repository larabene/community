<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * List the current users profiles
     *
     * @return $this
     */
    public function myProfiles()
    {
        return view('profiles.table')->with([
            'profiles' => Auth::user()->profiles()
        ]);
    }

    /**
     * Create a profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $profile = new Profile();

        return view('profiles.manage.create')->with(['profile' => $profile]);
    }

    /**
     * Save a profile to the database
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
