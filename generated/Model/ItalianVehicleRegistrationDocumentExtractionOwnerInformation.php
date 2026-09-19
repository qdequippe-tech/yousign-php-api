<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianVehicleRegistrationDocumentExtractionOwnerInformation
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Full name of the vehicle owner.
     *
     * @var string|null
     */
    protected $ownerFullName;
    /**
     * Address of the vehicle owner.
     *
     * @var string|null
     */
    protected $ownerAddress;
    /**
     * Type of the vehicle owner.
     *
     * @var string|null
     */
    protected $ownerType;
    /**
     * Birth date of the vehicle owner.
     *
     * @var \DateTime|null
     */
    protected $ownerBirthDate;

    /**
     * Full name of the vehicle owner.
     */
    public function getOwnerFullName(): ?string
    {
        return $this->ownerFullName;
    }

    /**
     * Full name of the vehicle owner.
     */
    public function setOwnerFullName(?string $ownerFullName): self
    {
        $this->initialized['ownerFullName'] = true;
        $this->ownerFullName = $ownerFullName;

        return $this;
    }

    /**
     * Address of the vehicle owner.
     */
    public function getOwnerAddress(): ?string
    {
        return $this->ownerAddress;
    }

    /**
     * Address of the vehicle owner.
     */
    public function setOwnerAddress(?string $ownerAddress): self
    {
        $this->initialized['ownerAddress'] = true;
        $this->ownerAddress = $ownerAddress;

        return $this;
    }

    /**
     * Type of the vehicle owner.
     */
    public function getOwnerType(): ?string
    {
        return $this->ownerType;
    }

    /**
     * Type of the vehicle owner.
     */
    public function setOwnerType(?string $ownerType): self
    {
        $this->initialized['ownerType'] = true;
        $this->ownerType = $ownerType;

        return $this;
    }

    /**
     * Birth date of the vehicle owner.
     */
    public function getOwnerBirthDate(): ?\DateTime
    {
        return $this->ownerBirthDate;
    }

    /**
     * Birth date of the vehicle owner.
     */
    public function setOwnerBirthDate(?\DateTime $ownerBirthDate): self
    {
        $this->initialized['ownerBirthDate'] = true;
        $this->ownerBirthDate = $ownerBirthDate;

        return $this;
    }
}
