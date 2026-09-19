<?php

namespace Qdequippe\Yousign\Api\Model;

class SocialSecurityExtraction
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
     * Social Security number extracted from the document.
     *
     * @var string|null
     */
    protected $socialSecurityNumber;
    /**
     * First name of the individual.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the individual.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Full name of the individual.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Social Security number extracted from the document.
     */
    public function getSocialSecurityNumber(): ?string
    {
        return $this->socialSecurityNumber;
    }

    /**
     * Social Security number extracted from the document.
     */
    public function setSocialSecurityNumber(?string $socialSecurityNumber): self
    {
        $this->initialized['socialSecurityNumber'] = true;
        $this->socialSecurityNumber = $socialSecurityNumber;

        return $this;
    }

    /**
     * First name of the individual.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the individual.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the individual.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the individual.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Full name of the individual.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name of the individual.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Classification label extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Classification label extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
