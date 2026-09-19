<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner
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
     * Date of the deed.
     *
     * @var string|null
     */
    protected $deedDate;
    /**
     * Type of the deed.
     *
     * @var string|null
     */
    protected $deedType;
    /**
     * Liens or encumbrances on the vehicle.
     *
     * @var string|null
     */
    protected $liensEncumbrances;
    /**
     * Full name of the previous owner.
     *
     * @var string|null
     */
    protected $previousOwnerFullName;

    /**
     * Date of the deed.
     */
    public function getDeedDate(): ?string
    {
        return $this->deedDate;
    }

    /**
     * Date of the deed.
     */
    public function setDeedDate(?string $deedDate): self
    {
        $this->initialized['deedDate'] = true;
        $this->deedDate = $deedDate;

        return $this;
    }

    /**
     * Type of the deed.
     */
    public function getDeedType(): ?string
    {
        return $this->deedType;
    }

    /**
     * Type of the deed.
     */
    public function setDeedType(?string $deedType): self
    {
        $this->initialized['deedType'] = true;
        $this->deedType = $deedType;

        return $this;
    }

    /**
     * Liens or encumbrances on the vehicle.
     */
    public function getLiensEncumbrances(): ?string
    {
        return $this->liensEncumbrances;
    }

    /**
     * Liens or encumbrances on the vehicle.
     */
    public function setLiensEncumbrances(?string $liensEncumbrances): self
    {
        $this->initialized['liensEncumbrances'] = true;
        $this->liensEncumbrances = $liensEncumbrances;

        return $this;
    }

    /**
     * Full name of the previous owner.
     */
    public function getPreviousOwnerFullName(): ?string
    {
        return $this->previousOwnerFullName;
    }

    /**
     * Full name of the previous owner.
     */
    public function setPreviousOwnerFullName(?string $previousOwnerFullName): self
    {
        $this->initialized['previousOwnerFullName'] = true;
        $this->previousOwnerFullName = $previousOwnerFullName;

        return $this;
    }
}
