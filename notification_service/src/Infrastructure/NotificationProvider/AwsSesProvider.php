<?php

namespace Notification\Service\Infrastructure\NotificationProvider;

use App\Domain\Notification\Notification;
use Aws\Ses\SesClient;

class AwsSesProvider implements NotificationProvider
{
    private SesClient $client;

    public function __construct(SesClient $client)
    {
        $this->client = $client;
    }

    public function send(Notification $notification): void
    {
        $this->client->sendEmail([
            'Source' => 'your-email@example.com',
            'Destination' => ['ToAddresses' => [$notification->getUserId()]],
            'Message' => [
                'Subject' => ['Data' => 'Notification'],
                'Body' => ['Text' => ['Data' => $notification->getMessage()]]
            ]
        ]);
    }
}