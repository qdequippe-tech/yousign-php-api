<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation
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
     * Fiscal power of the vehicle.
     *
     * @var float|null
     */
    protected $vehicleFiscalPower;
    /**
     * Maximum power of the vehicle engine.
     *
     * @var float|null
     */
    protected $vehicleMaxPower;
    /**
     * Power of the vehicle engine.
     *
     * @var float|null
     */
    protected $vehiclePower;

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
     * Fiscal power of the vehicle.
     */
    public function getVehicleFiscalPower(): ?float
    {
        return $this->vehicleFiscalPower;
    }

    /**
     * Fiscal power of the vehicle.
     */
    public function setVehicleFiscalPower(?float $vehicleFiscalPower): self
    {
        $this->initialized['vehicleFiscalPower'] = true;
        $this->vehicleFiscalPower = $vehicleFiscalPower;

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
     * Power of the vehicle engine.
     */
    public function getVehiclePower(): ?float
    {
        return $this->vehiclePower;
    }

    /**
     * Power of the vehicle engine.
     */
    public function setVehiclePower(?float $vehiclePower): self
    {
        $this->initialized['vehiclePower'] = true;
        $this->vehiclePower = $vehiclePower;

        return $this;
    }
}
