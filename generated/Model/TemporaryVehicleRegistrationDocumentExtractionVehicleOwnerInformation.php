<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Full name of the vehicle owner extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleOwnerFullName;
    /**
     * Birth date of the vehicle owner extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleOwnerBirthDate;
    /**
     * Address of the vehicle owner extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleOwnerAddress;

    /**
     * Full name of the vehicle owner extracted from the document.
     */
    public function getVehicleOwnerFullName(): ?string
    {
        return $this->vehicleOwnerFullName;
    }

    /**
     * Full name of the vehicle owner extracted from the document.
     */
    public function setVehicleOwnerFullName(?string $vehicleOwnerFullName): self
    {
        $this->initialized['vehicleOwnerFullName'] = true;
        $this->vehicleOwnerFullName = $vehicleOwnerFullName;

        return $this;
    }

    /**
     * Birth date of the vehicle owner extracted from the document.
     */
    public function getVehicleOwnerBirthDate(): ?string
    {
        return $this->vehicleOwnerBirthDate;
    }

    /**
     * Birth date of the vehicle owner extracted from the document.
     */
    public function setVehicleOwnerBirthDate(?string $vehicleOwnerBirthDate): self
    {
        $this->initialized['vehicleOwnerBirthDate'] = true;
        $this->vehicleOwnerBirthDate = $vehicleOwnerBirthDate;

        return $this;
    }

    /**
     * Address of the vehicle owner extracted from the document.
     */
    public function getVehicleOwnerAddress(): ?string
    {
        return $this->vehicleOwnerAddress;
    }

    /**
     * Address of the vehicle owner extracted from the document.
     */
    public function setVehicleOwnerAddress(?string $vehicleOwnerAddress): self
    {
        $this->initialized['vehicleOwnerAddress'] = true;
        $this->vehicleOwnerAddress = $vehicleOwnerAddress;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['vehicleOwnerFullName' => ['vehicle_owner_full_name', 'getVehicleOwnerFullName', 'setVehicleOwnerFullName'], 'vehicleOwnerBirthDate' => ['vehicle_owner_birth_date', 'getVehicleOwnerBirthDate', 'setVehicleOwnerBirthDate'], 'vehicleOwnerAddress' => ['vehicle_owner_address', 'getVehicleOwnerAddress', 'setVehicleOwnerAddress']];
    }
}
