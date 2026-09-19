<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchVehicleRegistrationDocumentExtractionVehicleInformation
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
     * Brand of the vehicle.
     *
     * @var string|null
     */
    protected $vehicleBrand;
    /**
     * Version of the vehicle.
     *
     * @var string|null
     */
    protected $vehicleVersion;
    /**
     * Model of the vehicle.
     *
     * @var string|null
     */
    protected $vehicleModel;

    /**
     * Brand of the vehicle.
     */
    public function getVehicleBrand(): ?string
    {
        return $this->vehicleBrand;
    }

    /**
     * Brand of the vehicle.
     */
    public function setVehicleBrand(?string $vehicleBrand): self
    {
        $this->initialized['vehicleBrand'] = true;
        $this->vehicleBrand = $vehicleBrand;

        return $this;
    }

    /**
     * Version of the vehicle.
     */
    public function getVehicleVersion(): ?string
    {
        return $this->vehicleVersion;
    }

    /**
     * Version of the vehicle.
     */
    public function setVehicleVersion(?string $vehicleVersion): self
    {
        $this->initialized['vehicleVersion'] = true;
        $this->vehicleVersion = $vehicleVersion;

        return $this;
    }

    /**
     * Model of the vehicle.
     */
    public function getVehicleModel(): ?string
    {
        return $this->vehicleModel;
    }

    /**
     * Model of the vehicle.
     */
    public function setVehicleModel(?string $vehicleModel): self
    {
        $this->initialized['vehicleModel'] = true;
        $this->vehicleModel = $vehicleModel;

        return $this;
    }
}
