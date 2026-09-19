<?php

namespace Qdequippe\Yousign\Api\Model;

class TemporaryVehicleRegistrationDocumentCheck
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
     * Check result for the vehicle owner.
     *
     * @var TemporaryVehicleRegistrationDocumentCheckVehicleOwner|null
     */
    protected $vehicleOwner;

    /**
     * Check result for the vehicle owner.
     */
    public function getVehicleOwner(): ?TemporaryVehicleRegistrationDocumentCheckVehicleOwner
    {
        return $this->vehicleOwner;
    }

    /**
     * Check result for the vehicle owner.
     */
    public function setVehicleOwner(?TemporaryVehicleRegistrationDocumentCheckVehicleOwner $vehicleOwner): self
    {
        $this->initialized['vehicleOwner'] = true;
        $this->vehicleOwner = $vehicleOwner;

        return $this;
    }
}
