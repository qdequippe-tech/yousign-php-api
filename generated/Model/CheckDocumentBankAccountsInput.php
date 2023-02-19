<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class CheckDocumentBankAccountsInput
{
    /**
     * Content in base 64 of the document to check.
     *
     * @var string|null
     */
    protected $file;
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
     * Company name to check on document.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Iban text to check on document.
     *
     * @var string|null
     */
    protected $iban;

    /**
     * Content in base 64 of the document to check.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Content in base 64 of the document to check.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

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
     * Iban text to check on document.
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * Iban text to check on document.
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }
}
