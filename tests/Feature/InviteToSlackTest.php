<?php

namespace Tests\Feature;

use App\Slack\FakeSlack;
use App\Slack\Slack;
use Tests\TestCase;

class InviteToSlackTest extends TestCase
{
    /** @var FakeSlack */
    private $slack;

    protected function setUp()
    {
        parent::setUp();

        $this->slack = $this->swap(Slack::class, new FakeSlack());
    }

    /** @test */
    public function unable_to_invite_with_an_invalid_email_address()
    {
        $response = $this->post(route('slack_invites.store'), [
            'email' => 'invalid-email-address',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function invite_can_only_be_sent_once()
    {
        $this->slack->invite('john.doe@example.com');

        $response = $this->post(route('slack_invites.store'), [
            'email' => 'john.doe@example.com',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('flash_notification');
    }

    /** @test */
    public function invite_user_to_slack()
    {
        $response = $this->post(route('slack_invites.store'), [
            'email' => 'john.doe@example.com',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('flash_notification');
        $this->slack->assertInvited('john.doe@example.com');
    }
}
