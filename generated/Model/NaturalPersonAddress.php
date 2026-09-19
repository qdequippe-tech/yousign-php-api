<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NaturalPersonAddress implements AdditionalPropertiesInterface
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
     * The first line of the address, typically the street name and number.
     *
     * @var string|null
     */
    protected $line1;
    /**
     * If needed, the second line of the address, typically an apartment or suite number.
     *
     * @var string|null
     */
    protected $line2;
    /**
     * The postal code of the address.
     *
     * @var string|null
     */
    protected $postalCode;
    /**
     * The city of the address.
     *
     * @var string|null
     */
    protected $city;

    /**
     * The first line of the address, typically the street name and number.
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * The first line of the address, typically the street name and number.
     */
    public function setLine1(?string $line1): self
    {
        $this->initialized['line1'] = true;
        $this->line1 = $line1;

        return $this;
    }

    /**
     * If needed, the second line of the address, typically an apartment or suite number.
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * If needed, the second line of the address, typically an apartment or suite number.
     */
    public function setLine2(?string $line2): self
    {
        $this->initialized['line2'] = true;
        $this->line2 = $line2;

        return $this;
    }

    /**
     * The postal code of the address.
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * The postal code of the address.
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->initialized['postalCode'] = true;
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * The city of the address.
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * The city of the address.
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['line1' => ['line1', 'getLine1', 'setLine1'], 'line2' => ['line2', 'getLine2', 'setLine2'], 'postalCode' => ['postal_code', 'getPostalCode', 'setPostalCode'], 'city' => ['city', 'getCity', 'setCity']];
    }
}
