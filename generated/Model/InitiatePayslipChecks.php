<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiatePayslipChecks
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
     * Expected full name to check against the document.
     *
     * @var InitiatePayslipChecksFullNameCheck|null
     */
    protected $fullNameCheck;

    /**
     * Expected full name to check against the document.
     */
    public function getFullNameCheck(): ?InitiatePayslipChecksFullNameCheck
    {
        return $this->fullNameCheck;
    }

    /**
     * Expected full name to check against the document.
     */
    public function setFullNameCheck(?InitiatePayslipChecksFullNameCheck $fullNameCheck): self
    {
        $this->initialized['fullNameCheck'] = true;
        $this->fullNameCheck = $fullNameCheck;

        return $this;
    }
}
