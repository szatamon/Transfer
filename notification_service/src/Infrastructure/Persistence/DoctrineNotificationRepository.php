<?php

namespace Notification\Service\Infrastructure\Persistence;
use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineNotificationRepository implements NotificationRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Notification $notification): void
    {
        $this->entityManager->persist($notification);
        $this->entityManager->flush();
    }
}