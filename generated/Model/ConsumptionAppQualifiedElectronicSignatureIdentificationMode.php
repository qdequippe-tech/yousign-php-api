<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ConsumptionAppQualifiedElectronicSignatureIdentificationMode implements AdditionalPropertiesInterface
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
     * @var ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification|null
     */
    protected $identityVerification;
    /**
     * @var int|null
     */
    protected $savedIdentity;

    public function getIdentityVerification(): ?ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification
    {
        return $this->identityVerification;
    }

    public function setIdentityVerification(?ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification $identityVerification): self
    {
        $this->initialized['identityVerification'] = true;
        $this->identityVerification = $identityVerification;

        return $this;
    }

    public function getSavedIdentity(): ?int
    {
        return $this->savedIdentity;
    }

    public function setSavedIdentity(?int $savedIdentity): self
    {
        $this->initialized['savedIdentity'] = true;
        $this->savedIdentity = $savedIdentity;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['identityVerification' => ['identity_verification', 'getIdentityVerification', 'setIdentityVerification'], 'savedIdentity' => ['saved_identity', 'getSavedIdentity', 'setSavedIdentity']];
    }
}
