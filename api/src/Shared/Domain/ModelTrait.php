<?php

declare(strict_types=1);

namespace App\Shared\Domain;

trait ModelTrait
{
    final public function toArray(): array
    {
        return get_object_vars($this);
    }

    final public function hydrateData(array $data): void
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $setter = 'set' . lcfirst($property);
                $this->$setter($value);
            }
        }
    }
}
