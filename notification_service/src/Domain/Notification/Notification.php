<?php

namespace App\Domain\Notification;

class Notification
{
    private string $id;
    private string $userId;
    private string $channel;
    private string $message;

    public function __construct(string $id, string $userId, string $channel, string $message)
    {
        $this->id = uniqid('', true);
        $this->userId = $userId;
        $this->channel = $channel;
        $this->message = $message;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

}