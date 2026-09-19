<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation
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
     * Type of fuel used by the vehicle.
     *
     * @var string|null
     */
    protected $vehicleFuelType;
    /**
     * Maximum power of the vehicle engine.
     *
     * @var float|null
     */
    protected $vehicleMaxPower;
    /**
     * Displacement type of the vehicle engine.
     *
     * @var float|null
     */
    protected $vehicleDisplacementType;

    /**
     * Type of fuel used by the vehicle.
     */
    public function getVehicleFuelType(): ?string
    {
        return $this->vehicleFuelType;
    }

    /**
     * Type of fuel used by the vehicle.
     */
    public function setVehicleFuelType(?string $vehicleFuelType): self
    {
        $this->initialized['vehicleFuelType'] = true;
        $this->vehicleFuelType = $vehicleFuelType;

        return $this;
    }

    /**
     * Maximum power of the vehicle engine.
     */
    public function getVehicleMaxPower(): ?float
    {
        return $this->vehicleMaxPower;
    }

    /**
     * Maximum power of the vehicle engine.
     */
    public function setVehicleMaxPower(?float $vehicleMaxPower): self
    {
        $this->initialized['vehicleMaxPower'] = true;
        $this->vehicleMaxPower = $vehicleMaxPower;

        return $this;
    }

    /**
     * Displacement type of the vehicle engine.
     */
    public function getVehicleDisplacementType(): ?float
    {
        return $this->vehicleDisplacementType;
    }

    /**
     * Displacement type of the vehicle engine.
     */
    public function setVehicleDisplacementType(?float $vehicleDisplacementType): self
    {
        $this->initialized['vehicleDisplacementType'] = true;
        $this->vehicleDisplacementType = $vehicleDisplacementType;

        return $this;
    }
}
