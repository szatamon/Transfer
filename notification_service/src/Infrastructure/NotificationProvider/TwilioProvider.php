<?php

namespace Notification\Service\Infrastructure\NotificationProvider;

use App\Domain\Notification\Notification;
use Twilio\Rest\Client;

class TwilioProvider implements NotificationProvider
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function send(Notification $notification): void
    {
        $this->client->messages->create(
            $notification->getUserId(),
            [
                'from' => '+1234567890',
                'body' => $notification->getMessage()
            ]
        );
    }
}