<?php

namespace Qdequippe\Yousign\Api\Model;

class ConsumptionApp extends \ArrayObject
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
    protected $electronicSignature;
    /**
     * @var int|null
     */
    protected $advancedElectronicSignature;
    /**
     * @var int|null
     */
    protected $advancedElectronicSignatureWithQualifiedCertificate;
    /**
     * @var ConsumptionAppQualifiedElectronicSignatureIdentificationMode|null
     */
    protected $qualifiedElectronicSignatureIdentificationMode;

    public function getElectronicSignature(): ?int
    {
        return $this->electronicSignature;
    }

    public function setElectronicSignature(?int $electronicSignature): self
    {
        $this->initialized['electronicSignature'] = true;
        $this->electronicSignature = $electronicSignature;

        return $this;
    }

    public function getAdvancedElectronicSignature(): ?int
    {
        return $this->advancedElectronicSignature;
    }

    public function setAdvancedElectronicSignature(?int $advancedElectronicSignature): self
    {
        $this->initialized['advancedElectronicSignature'] = true;
        $this->advancedElectronicSignature = $advancedElectronicSignature;

        return $this;
    }

    public function getAdvancedElectronicSignatureWithQualifiedCertificate(): ?int
    {
        return $this->advancedElectronicSignatureWithQualifiedCertificate;
    }

    public function setAdvancedElectronicSignatureWithQualifiedCertificate(?int $advancedElectronicSignatureWithQualifiedCertificate): self
    {
        $this->initialized['advancedElectronicSignatureWithQualifiedCertificate'] = true;
        $this->advancedElectronicSignatureWithQualifiedCertificate = $advancedElectronicSignatureWithQualifiedCertificate;

        return $this;
    }

    public function getQualifiedElectronicSignatureIdentificationMode(): ?ConsumptionAppQualifiedElectronicSignatureIdentificationMode
    {
        return $this->qualifiedElectronicSignatureIdentificationMode;
    }

    public function setQualifiedElectronicSignatureIdentificationMode(?ConsumptionAppQualifiedElectronicSignatureIdentificationMode $qualifiedElectronicSignatureIdentificationMode): self
    {
        $this->initialized['qualifiedElectronicSignatureIdentificationMode'] = true;
        $this->qualifiedElectronicSignatureIdentificationMode = $qualifiedElectronicSignatureIdentificationMode;

        return $this;
    }
}
