<?php

namespace App\Slack;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class LegacySlack implements Slack
{
    /**
     * @var string
     */
    private $legacyToken;

    /**
     * @param string $legacyToken
     */
    public function __construct(string $legacyToken)
    {
        $this->legacyToken = $legacyToken;
    }

    /**
     * @param string $email
     * @return void
     * @throws SlackInviteError
     */
    public function invite(string $email): void
    {
        $response = $this->sendInvite($email);
        if ( ! $response->ok) {
            throw new SlackInviteError($response->error);
        }
    }

    /**
     * @param string $email
     * @return \stdClass
     */
    public function sendInvite(string $email): \stdClass
    {
        $response = (new Client())->post('https://slack.com/api/users.admin.invite', [
            'query' => [
                'token' => $this->legacyToken,
                'email' => $email,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \UnexpectedValueException();
        }

        $body = $response->getBody()->getContents();

        return \GuzzleHttp\json_decode($body);
    }
}
