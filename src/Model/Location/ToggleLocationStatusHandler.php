<?php
namespace Model\Location;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Model\Entity\Location;

class ToggleLocationStatusHandler
{
    private $em;
    private $dispatcher;

    public function __construct(
        EntityManagerInterface $em,
        EventDispatcherInterface $dispatcher
    ) {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function handle(ToggleLocationStatus $command)
    {
        $location = $this->em->getRepository(Location::class)->find($command->getId());

        if (!($location instanceof Location)) {
            throw new \InvalidArgumentException('Not found');
        }
        $location->setStatus($command->getStatus());
        $this->em->persist($location);
        $this->em->flush();

//        $this->dispatcher->dispatch(
//            LocationCreated::class,
//            new LocationCreated($location)
//        );

        return new LocationResponse($location);
    }
}
