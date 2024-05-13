<?php

namespace Qdequippe\Yousign\Api\Model;

class ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification extends \ArrayObject
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
     * @var int|null
     */
    protected $succeeded;
    /**
     * @var int|null
     */
    protected $rejected;

    public function getSucceeded(): ?int
    {
        return $this->succeeded;
    }

    public function setSucceeded(?int $succeeded): self
    {
        $this->initialized['succeeded'] = true;
        $this->succeeded = $succeeded;

        return $this;
    }

    public function getRejected(): ?int
    {
        return $this->rejected;
    }

    public function setRejected(?int $rejected): self
    {
        $this->initialized['rejected'] = true;
        $this->rejected = $rejected;

        return $this;
    }
}
