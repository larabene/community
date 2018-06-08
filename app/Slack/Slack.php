<?php

namespace App\Slack;

interface Slack
{
    /**
     * @param string $email
     * @return void
     * @throws SlackInviteError
     */
    public function invite(string $email): void;
}
