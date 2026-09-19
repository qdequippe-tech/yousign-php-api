<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataCompanyInformationCommercialRegistration implements AdditionalPropertiesInterface
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
     * Indicates the location of the company's commercial register.
     *
     * @var string|null
     */
    protected $location;
    /**
     * Indicates the company's registration date in the commercial register.
     *
     * @var \DateTime|null
     */
    protected $registeredOn;

    /**
     * Indicates the location of the company's commercial register.
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * Indicates the location of the company's commercial register.
     */
    public function setLocation(?string $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;

        return $this;
    }

    /**
     * Indicates the company's registration date in the commercial register.
     */
    public function getRegisteredOn(): ?\DateTime
    {
        return $this->registeredOn;
    }

    /**
     * Indicates the company's registration date in the commercial register.
     */
    public function setRegisteredOn(?\DateTime $registeredOn): self
    {
        $this->initialized['registeredOn'] = true;
        $this->registeredOn = $registeredOn;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['location' => ['location', 'getLocation', 'setLocation'], 'registeredOn' => ['registered_on', 'getRegisteredOn', 'setRegisteredOn']];
    }
}
