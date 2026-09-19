<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataBeneficialOwners implements AdditionalPropertiesInterface
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
     * The beneficial owner's first name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The beneficial owner's last name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The beneficial owner's gender, as declared in the register. "f" for Female, "m" for Male, "x" for Non-binary or unspecified.
     *
     * @var string|null
     */
    protected $gender;
    /**
     * The beneficial owner's date of birth, as declared in the register. Registers are only required to publish the month of birth, so this is usually a partial date (`YYYY-MM`) rather than a full one (`YYYY-MM-DD`).
     *
     * @var string|null
     */
    protected $bornOn;
    /**
     * Share of the company's capital held by the beneficial owner, in percent. Null when the register does not declare it.
     *
     * @var float|null
     */
    protected $percentageOfShares;
    /**
     * Share of the company's voting rights held by the beneficial owner, in percent. Null when the register does not declare it.
     *
     * @var float|null
     */
    protected $votingPercentage;

    /**
     * The beneficial owner's first name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The beneficial owner's first name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The beneficial owner's last name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The beneficial owner's last name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The beneficial owner's gender, as declared in the register. "f" for Female, "m" for Male, "x" for Non-binary or unspecified.
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * The beneficial owner's gender, as declared in the register. "f" for Female, "m" for Male, "x" for Non-binary or unspecified.
     */
    public function setGender(?string $gender): self
    {
        $this->initialized['gender'] = true;
        $this->gender = $gender;

        return $this;
    }

    /**
     * The beneficial owner's date of birth, as declared in the register. Registers are only required to publish the month of birth, so this is usually a partial date (`YYYY-MM`) rather than a full one (`YYYY-MM-DD`).
     */
    public function getBornOn(): ?string
    {
        return $this->bornOn;
    }

    /**
     * The beneficial owner's date of birth, as declared in the register. Registers are only required to publish the month of birth, so this is usually a partial date (`YYYY-MM`) rather than a full one (`YYYY-MM-DD`).
     */
    public function setBornOn(?string $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * Share of the company's capital held by the beneficial owner, in percent. Null when the register does not declare it.
     */
    public function getPercentageOfShares(): ?float
    {
        return $this->percentageOfShares;
    }

    /**
     * Share of the company's capital held by the beneficial owner, in percent. Null when the register does not declare it.
     */
    public function setPercentageOfShares(?float $percentageOfShares): self
    {
        $this->initialized['percentageOfShares'] = true;
        $this->percentageOfShares = $percentageOfShares;

        return $this;
    }

    /**
     * Share of the company's voting rights held by the beneficial owner, in percent. Null when the register does not declare it.
     */
    public function getVotingPercentage(): ?float
    {
        return $this->votingPercentage;
    }

    /**
     * Share of the company's voting rights held by the beneficial owner, in percent. Null when the register does not declare it.
     */
    public function setVotingPercentage(?float $votingPercentage): self
    {
        $this->initialized['votingPercentage'] = true;
        $this->votingPercentage = $votingPercentage;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'gender' => ['gender', 'getGender', 'setGender'], 'bornOn' => ['born_on', 'getBornOn', 'setBornOn'], 'percentageOfShares' => ['percentage_of_shares', 'getPercentageOfShares', 'setPercentageOfShares'], 'votingPercentage' => ['voting_percentage', 'getVotingPercentage', 'setVotingPercentage']];
    }
}
