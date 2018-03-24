<?php

namespace Model\Location;

class LocationStatus
{
    const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';

    private $status;

    public function __construct(string $status)
    {
        if (!in_array($status, [self::STATUS_ENABLED, self::STATUS_DISABLED])) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;
    }

    public function __toString()
    {
        return $this->status;
    }
}