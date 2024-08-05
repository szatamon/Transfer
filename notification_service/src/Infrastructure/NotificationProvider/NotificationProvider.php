<?php

namespace Notification\Service\Infrastructure\NotificationProvider;

use App\Domain\Notification\Notification;

interface NotificationProvider
{
    public function send(Notification $notification): void;
}