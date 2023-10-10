<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Entity\Traits\Doctrine\Types\CarbonDateTimeType;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * TimestampTrait.
 */
trait TimestampTrait
{

    #[ORM\Column(type: CarbonDateTimeType::CARBON_DATE_TIME, nullable: false)]
    protected Carbon $createdAt;

    #[ORM\Column(type: CarbonDateTimeType::CARBON_DATE_TIME, nullable: true)]
    protected ?Carbon $updatedAt = null;

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
