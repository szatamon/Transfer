<?php

namespace App\Domain\Notification;

class NotificationService
{
    private NotificationRepository $notificationRepository;
    private array $providers;

    public function __construct(NotificationRepository $notificationRepository, array $providers)
    {
        $this->notificationRepository = $notificationRepository;
        $this->providers = $providers;
    }

    public function sendNotification(string $user_id, string $channel, string $message)
    {
        $notification = new Notification($user_id, $channel, $message);
        $this->notificationRepository->save($notification);

        foreach ($this->providers[$channel] as $provider) {
            try {
                $provider->send($notification);
                break;
            } catch (\Exception $e) {
                //add log
            }
        }
    }
}