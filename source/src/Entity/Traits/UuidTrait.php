<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * UuidTrait.
 */
trait UuidTrait
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    protected Uuid $uuid;


    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getUuidString(): string
    {
        return $this->uuid->toRfc4122();
    }

    public function setUuid(Uuid $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

}
