<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;

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
     * @param Request $request
     *
     * @return $this
     */
    public function edit(Request $request)
    {
        return view('members.manage.edit')->with([
            'user' => $request->user(),
        ]);
    }

    /**
     * Update member.
     *
     * @param MemberRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MemberRequest $request)
    {
        $data = collect($request->input())->only([
            'name',
            'email',
            'password',
        ])->filter();

        if($data->has('password')) {
            $data->put('password', bcrypt($data->get('password')));
        }

        $request->user()->fill($data->all())->saveOrFail();

        flash('Je profiel is bijgewertkt.', 'success');

        return redirect()->route('user.edit');
    }
}
