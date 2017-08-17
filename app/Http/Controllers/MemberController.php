<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    /**
     * MemberController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'show',
        ]);
    }

    /**
     * Edit profile.
     *
     * @return string
     */
    public function edit()
    {
        flash('Deze functie moet nog gebouwd worden', 'warning');

        return redirect()->route('guide');
    }
}
