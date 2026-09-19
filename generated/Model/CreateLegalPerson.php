<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateLegalPerson
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
     * Name of the company.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Country code of the company (ISO 3166-1 alpha-2).
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Bank account details.
     *
     * @var BankAccount|null
     */
    protected $bankAccount;
    /**
     * Legal representatives of the company.
     *
     * @var list<Identity>|null
     */
    protected $legalRepresentatives;

    /**
     * Name of the company.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Name of the company.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Country code of the company (ISO 3166-1 alpha-2).
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * Country code of the company (ISO 3166-1 alpha-2).
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Bank account details.
     */
    public function getBankAccount(): ?BankAccount
    {
        return $this->bankAccount;
    }

    /**
     * Bank account details.
     */
    public function setBankAccount(?BankAccount $bankAccount): self
    {
        $this->initialized['bankAccount'] = true;
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Legal representatives of the company.
     *
     * @return list<Identity>|null
     */
    public function getLegalRepresentatives(): ?array
    {
        return $this->legalRepresentatives;
    }

    /**
     * Legal representatives of the company.
     *
     * @param list<Identity>|null $legalRepresentatives
     */
    public function setLegalRepresentatives(?array $legalRepresentatives): self
    {
        $this->initialized['legalRepresentatives'] = true;
        $this->legalRepresentatives = $legalRepresentatives;

        return $this;
    }
}
