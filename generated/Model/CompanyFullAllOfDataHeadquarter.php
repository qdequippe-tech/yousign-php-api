<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataHeadquarter implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $addressLine1;
    /**
     * @var string|null
     */
    protected $addressLine2;
    /**
     * @var string|null
     */
    protected $postalCode;
    /**
     * @var string|null
     */
    protected $city;
    /**
     * @var string|null
     */
    protected $countryCode;

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): self
    {
        $this->initialized['addressLine1'] = true;
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): self
    {
        $this->initialized['addressLine2'] = true;
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->initialized['postalCode'] = true;
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

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
        return ['addressLine1' => ['address_line_1', 'getAddressLine1', 'setAddressLine1'], 'addressLine2' => ['address_line_2', 'getAddressLine2', 'setAddressLine2'], 'postalCode' => ['postal_code', 'getPostalCode', 'setPostalCode'], 'city' => ['city', 'getCity', 'setCity'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode']];
    }
}
