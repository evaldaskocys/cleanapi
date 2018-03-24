<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Model\Location\LocationCreated;

class LocationCreatedSubscriber implements EventSubscriberInterface
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            LocationCreated::class => ['logLocationCreated', 5],
        ];
    }

    public function logLocationCreated(LocationCreated $event)
    {
        $this->logger->info($event->getLocation()->getCity());
    }
}
