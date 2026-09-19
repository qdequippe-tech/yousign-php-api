<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateBankAccountLookupWithLegalPersonLegalPerson implements AdditionalPropertiesInterface
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
     * Name of the company, matched against the name the bank holds for the account holder.
     *
     * @var string|null
     */
    protected $companyName;

    /**
     * Name of the company, matched against the name the bank holds for the account holder.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Name of the company, matched against the name the bank holds for the account holder.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['companyName' => ['company_name', 'getCompanyName', 'setCompanyName']];
    }
}
