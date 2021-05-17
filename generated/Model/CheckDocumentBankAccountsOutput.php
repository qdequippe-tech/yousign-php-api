<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class CheckDocumentBankAccountsOutput
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Firstname to check on document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Birth name to check on document.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * Lastname to check on document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Iban to check on document.
     *
     * @var string|null
     */
    protected $iban;
    /**
     * Company name to check on document.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Type of document.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Workspace creator of the object.
     *
     * @var string|null
     */
    protected $workspace;
    /**
     * Creator of the object.
     *
     * @var string|null
     */
    protected $creator;
    /**
     * Extracted iban on the document.
     *
     * @var string|null
     */
    protected $extractedIban;
    /**
     * Defines if one firstname sent in the input is valid.
     *
     * @var bool|null
     */
    protected $firstNameValid;
    /**
     * Defines if birth name sent in the input is valid.
     *
     * @var bool|null
     */
    protected $birthNameValid;
    /**
     * Defines if lastname sent in the input is valid.
     *
     * @var bool|null
     */
    protected $lastNameValid;
    /**
     * Defines if company name sent in the input is valid.
     *
     * @var bool|null
     */
    protected $companyNameValid;
    /**
     * Defines if iban sent in the input is valid.
     *
     * @var bool|null
     */
    protected $ibanValid;

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Firstname to check on document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Firstname to check on document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Birth name to check on document.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * Birth name to check on document.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * Lastname to check on document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Lastname to check on document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Iban to check on document.
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * Iban to check on document.
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Company name to check on document.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Company name to check on document.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Type of document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Type of document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Workspace creator of the object.
     */
    public function getWorkspace(): ?string
    {
        return $this->workspace;
    }

    /**
     * Workspace creator of the object.
     */
    public function setWorkspace(?string $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }

    /**
     * Creator of the object.
     */
    public function getCreator(): ?string
    {
        return $this->creator;
    }

    /**
     * Creator of the object.
     */
    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Extracted iban on the document.
     */
    public function getExtractedIban(): ?string
    {
        return $this->extractedIban;
    }

    /**
     * Extracted iban on the document.
     */
    public function setExtractedIban(?string $extractedIban): self
    {
        $this->extractedIban = $extractedIban;

        return $this;
    }

    /**
     * Defines if one firstname sent in the input is valid.
     */
    public function getFirstNameValid(): ?bool
    {
        return $this->firstNameValid;
    }

    /**
     * Defines if one firstname sent in the input is valid.
     */
    public function setFirstNameValid(?bool $firstNameValid): self
    {
        $this->firstNameValid = $firstNameValid;

        return $this;
    }

    /**
     * Defines if birth name sent in the input is valid.
     */
    public function getBirthNameValid(): ?bool
    {
        return $this->birthNameValid;
    }

    /**
     * Defines if birth name sent in the input is valid.
     */
    public function setBirthNameValid(?bool $birthNameValid): self
    {
        $this->birthNameValid = $birthNameValid;

        return $this;
    }

    /**
     * Defines if lastname sent in the input is valid.
     */
    public function getLastNameValid(): ?bool
    {
        return $this->lastNameValid;
    }

    /**
     * Defines if lastname sent in the input is valid.
     */
    public function setLastNameValid(?bool $lastNameValid): self
    {
        $this->lastNameValid = $lastNameValid;

        return $this;
    }

    /**
     * Defines if company name sent in the input is valid.
     */
    public function getCompanyNameValid(): ?bool
    {
        return $this->companyNameValid;
    }

    /**
     * Defines if company name sent in the input is valid.
     */
    public function setCompanyNameValid(?bool $companyNameValid): self
    {
        $this->companyNameValid = $companyNameValid;

        return $this;
    }

    /**
     * Defines if iban sent in the input is valid.
     */
    public function getIbanValid(): ?bool
    {
        return $this->ibanValid;
    }

    /**
     * Defines if iban sent in the input is valid.
     */
    public function setIbanValid(?bool $ibanValid): self
    {
        $this->ibanValid = $ibanValid;

        return $this;
    }
}
