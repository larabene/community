<?php

namespace App\Http\Controllers;

use App\Slack\Slack;
use App\Slack\SlackInviteError;

class SlackInviteController extends Controller
{
    /**
     * @var Slack
     */
    private $slack;

    /**
     * @param Slack $slack
     */
    public function __construct(Slack $slack)
    {
        $this->slack = $slack;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('slack_invites.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'email' => 'email',
        ]);

        try {
            $this->slack->invite(request('email'));

            flash()->success(trans('slack.invited'));

            return redirect()->back();
        } catch (SlackInviteError $e) {
            flash()->error(trans("slack.{$e->getMessage()}"));

            return redirect()->back()->withInput();
        }
    }
}
