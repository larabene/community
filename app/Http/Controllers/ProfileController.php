<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Profile;

class ProfileController extends Controller
{
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
        Profile::create($request->all());

        flash('Het profiel is opgeslagen.');

        return redirect(route('profile.list'));
    }
}
