<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateVehicleRegistrationDocumentChecks
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
     * Vehicle owner information to check against the document.
     *
     * @var InitiateVehicleRegistrationDocumentChecksVehicleOwner|null
     */
    protected $vehicleOwner;

    /**
     * Vehicle owner information to check against the document.
     */
    public function getVehicleOwner(): ?InitiateVehicleRegistrationDocumentChecksVehicleOwner
    {
        return $this->vehicleOwner;
    }

    /**
     * Vehicle owner information to check against the document.
     */
    public function setVehicleOwner(?InitiateVehicleRegistrationDocumentChecksVehicleOwner $vehicleOwner): self
    {
        $this->initialized['vehicleOwner'] = true;
        $this->vehicleOwner = $vehicleOwner;

        return $this;
    }
}
