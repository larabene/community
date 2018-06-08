<?php

namespace App\Slack;

use PHPUnit\Framework\Assert as P;

class FakeSlack implements Slack
{
    /**
     * @var array
     */
    private $invites = [];

    /**
     * @param string $email
     */
    public function assertInvited(string $email)
    {
        P::assertContains($email, $this->invites, "Expected [$email] to be invited.");
    }

    /**
     * @param string $email
     * @return void
     * @throws SlackInviteError
     */
    public function invite(string $email): void
    {
        if (in_array($email, $this->invites)) {
            throw new SlackInviteError('already_invited');
        }

        $this->invites[] = $email;
    }
}
