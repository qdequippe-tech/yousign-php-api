<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateTemporaryVehicleRegistrationDocumentChecks
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
     * Expected vehicle owner information.
     *
     * @var InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwner|null
     */
    protected $vehicleOwner;

    /**
     * Expected vehicle owner information.
     */
    public function getVehicleOwner(): ?InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwner
    {
        return $this->vehicleOwner;
    }

    /**
     * Expected vehicle owner information.
     */
    public function setVehicleOwner(?InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwner $vehicleOwner): self
    {
        $this->initialized['vehicleOwner'] = true;
        $this->vehicleOwner = $vehicleOwner;

        return $this;
    }
}
