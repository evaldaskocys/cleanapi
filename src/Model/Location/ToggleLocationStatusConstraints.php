<?php
namespace Model\Location;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\ValidatorConstraintsInterface;

class ToggleLocationStatusConstraints implements ValidatorConstraintsInterface
{
    public function constraints(): Assert\Collection
    {
        return new Assert\Collection([
            'status' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\Choice([LocationStatus::STATUS_ENABLED, LocationStatus::STATUS_DISABLED]),
            ]),
        ]);
    }
}
