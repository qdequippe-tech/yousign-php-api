<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder implements AdditionalPropertiesInterface
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
     * Type of the policy holder.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Expected first name of the policy holder.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Expected last name of the policy holder.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Expected company name of the policy holder.
     *
     * @var string|null
     */
    protected $companyName;

    /**
     * Type of the policy holder.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the policy holder.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Expected first name of the policy holder.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Expected first name of the policy holder.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Expected last name of the policy holder.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Expected last name of the policy holder.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Expected company name of the policy holder.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Expected company name of the policy holder.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName']];
    }
}
