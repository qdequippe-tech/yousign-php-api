<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification implements AdditionalPropertiesInterface
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
     * @var int|null
     */
    protected $succeeded;
    /**
     * @var int|null
     */
    protected $rejected;
    /**
     * @var int|null
     */
    protected $expiredAfterSucceeded;

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

    public function getExpiredAfterSucceeded(): ?int
    {
        return $this->expiredAfterSucceeded;
    }

    public function setExpiredAfterSucceeded(?int $expiredAfterSucceeded): self
    {
        $this->initialized['expiredAfterSucceeded'] = true;
        $this->expiredAfterSucceeded = $expiredAfterSucceeded;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['succeeded' => ['succeeded', 'getSucceeded', 'setSucceeded'], 'rejected' => ['rejected', 'getRejected', 'setRejected'], 'expiredAfterSucceeded' => ['expired_after_succeeded', 'getExpiredAfterSucceeded', 'setExpiredAfterSucceeded']];
    }
}
