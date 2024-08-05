<?php

namespace App\Domain\Notification;

interface NotificationRepository
{
    public function save(Notification $notification): void;
}