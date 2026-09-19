<?php

namespace Qdequippe\Yousign\Api\Model;

class TemporaryVehicleRegistrationDocumentCheckVehicleOwner
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
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     *
     * @var DocumentAnalysisCheck|null
     */
    protected $ownerName;

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function getOwnerName(): ?DocumentAnalysisCheck
    {
        return $this->ownerName;
    }

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function setOwnerName(?DocumentAnalysisCheck $ownerName): self
    {
        $this->initialized['ownerName'] = true;
        $this->ownerName = $ownerName;

        return $this;
    }
}
