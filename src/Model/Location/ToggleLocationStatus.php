<?php
namespace Model\Location;

class ToggleLocationStatus
{
    private $id;
    private $locationStatus;

    public function __construct(int $id, LocationStatus $locationStatus)
    {
        $this->id = $id;
        $this->locationStatus = $locationStatus;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): LocationStatus
    {
        return $this->locationStatus;
    }
}
