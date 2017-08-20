<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests\MemberRequest;

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
     * Edit member.
     *
     * @return
     */
    public function edit()
    {
        $user = Auth::user();

        return view('members.manage.edit')->with(['user' => $user]);
    }

    /**
     * Update member.
     *
     * @return
     */
    public function update(MemberRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        flash('De member is bijgewerkt', 'success');

        return redirect(route('user.edit'));
    }
}
