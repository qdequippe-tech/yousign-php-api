<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataLegalRepresentatives implements AdditionalPropertiesInterface
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
     * The representative's role within the company.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Indicates whether the representative is a natural person or a legal entity.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The representative's first name in case of a natural person, otherwise null.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The representative's last name in case of a natural person, otherwise null.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The representative's birth name in case of a natural person, otherwise null.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * The representative's birthdate in case of a natural person, otherwise null.
     *
     * @var \DateTime|null
     */
    protected $bornOn;
    /**
     * The representative's company name in case of a legal person, otherwise null.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * The representative's company number in case of a legal person, otherwise null.
     *
     * @var string|null
     */
    protected $companyNumber;

    /**
     * The representative's role within the company.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * The representative's role within the company.
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * Indicates whether the representative is a natural person or a legal entity.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Indicates whether the representative is a natural person or a legal entity.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The representative's first name in case of a natural person, otherwise null.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The representative's first name in case of a natural person, otherwise null.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The representative's last name in case of a natural person, otherwise null.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The representative's last name in case of a natural person, otherwise null.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The representative's birth name in case of a natural person, otherwise null.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * The representative's birth name in case of a natural person, otherwise null.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->initialized['birthName'] = true;
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * The representative's birthdate in case of a natural person, otherwise null.
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * The representative's birthdate in case of a natural person, otherwise null.
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * The representative's company name in case of a legal person, otherwise null.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * The representative's company name in case of a legal person, otherwise null.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * The representative's company number in case of a legal person, otherwise null.
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * The representative's company number in case of a legal person, otherwise null.
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['title' => ['title', 'getTitle', 'setTitle'], 'type' => ['type', 'getType', 'setType'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'birthName' => ['birth_name', 'getBirthName', 'setBirthName'], 'bornOn' => ['born_on', 'getBornOn', 'setBornOn'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName'], 'companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber']];
    }
}
