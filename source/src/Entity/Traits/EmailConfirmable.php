<?php

namespace App\Entity\Traits;

use App\Entity\Traits\Doctrine\Types\CarbonDateTimeType;
use Carbon\Carbon;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


trait EmailConfirmable
{
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $emailConfirmationCode = null;

    #[ORM\Column(type: CarbonDateTimeType::CARBON_DATE_TIME, nullable: true)]
    private ?Carbon $emailConfirmationCodeExpiredAt = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isEmailConfirmed = false;

    /**
     * @return $this
     */
    public function resetEmailConfirmation(): static
    {
        $this->emailConfirmationCode = null;
        $this->emailConfirmationCodeExpiredAt = null;

        return $this;
    }

    public function getEmailConfirmationCode(): ?string
    {
        return $this->emailConfirmationCode;
    }

    /**
     * @return $this
     */
    public function setEmailConfirmationCode(?string $emailConfirmationCode): static
    {
        $this->emailConfirmationCode = $emailConfirmationCode;

        return $this;
    }

    public function getEmailConfirmationCodeExpiredAt(): ?Carbon
    {
        return $this->emailConfirmationCodeExpiredAt;
    }

    /**
     * @return $this
     */
    public function setEmailConfirmationCodeExpiredAt(?Carbon $emailConfirmationCodeExpiredAt): static
    {
        $this->emailConfirmationCodeExpiredAt = $emailConfirmationCodeExpiredAt;

        return $this;
    }

    public function isEmailConfirmed(): bool
    {
        return $this->isEmailConfirmed;
    }

    /**
     * @return $this
     */
    public function setIsEmailConfirmed(bool $isEmailConfirmed): static
    {
        $this->isEmailConfirmed = $isEmailConfirmed;

        return $this;
    }

    public function isEmailConfirmationCodeExpired(): bool
    {
        return null === $this->emailConfirmationCodeExpiredAt
            || $this->emailConfirmationCodeExpiredAt->lessThan(Carbon::now());
    }
}
