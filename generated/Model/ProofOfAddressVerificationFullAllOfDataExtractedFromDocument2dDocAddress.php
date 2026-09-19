<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress implements AdditionalPropertiesInterface
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
     * The street type, name and number.
     *
     * @var string|null
     */
    protected $line1;
    /**
     * The postal code.
     *
     * @var string|null
     */
    protected $postalCode;
    /**
     * The city name.
     *
     * @var string|null
     */
    protected $city;
    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * The street type, name and number.
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * The street type, name and number.
     */
    public function setLine1(?string $line1): self
    {
        $this->initialized['line1'] = true;
        $this->line1 = $line1;

        return $this;
    }

    /**
     * The postal code.
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * The postal code.
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->initialized['postalCode'] = true;
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * The city name.
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * The city name.
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['line1' => ['line1', 'getLine1', 'setLine1'], 'postalCode' => ['postal_code', 'getPostalCode', 'setPostalCode'], 'city' => ['city', 'getCity', 'setCity'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode']];
    }
}
