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
}
