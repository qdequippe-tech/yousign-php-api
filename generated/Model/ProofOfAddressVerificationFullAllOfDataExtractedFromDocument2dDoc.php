<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc implements AdditionalPropertiesInterface
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
     * If found, the full name extracted from the 2D-Doc.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * If found, the address extracted from the 2D-Doc.
     *
     * @var ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress|null
     */
    protected $address;

    /**
     * If found, the full name extracted from the 2D-Doc.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * If found, the full name extracted from the 2D-Doc.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * If found, the address extracted from the 2D-Doc.
     */
    public function getAddress(): ?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress
    {
        return $this->address;
    }

    /**
     * If found, the address extracted from the 2D-Doc.
     */
    public function setAddress(?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['fullName' => ['full_name', 'getFullName', 'setFullName'], 'address' => ['address', 'getAddress', 'setAddress']];
    }
}
