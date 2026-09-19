<?php

namespace Qdequippe\Yousign\Api\Model;

class DriverLicenceExtraction
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
     * Date of birth of the individual.
     *
     * @var \DateTime|null
     */
    protected $bornOn;
    /**
     * Expiration date of the driver licence.
     *
     * @var \DateTime|null
     */
    protected $expiredOn;
    /**
     * List of license types.
     *
     * @var list<string>|null
     */
    protected $licenseType;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

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
     * Date of birth of the individual.
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * Date of birth of the individual.
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * Expiration date of the driver licence.
     */
    public function getExpiredOn(): ?\DateTime
    {
        return $this->expiredOn;
    }

    /**
     * Expiration date of the driver licence.
     */
    public function setExpiredOn(?\DateTime $expiredOn): self
    {
        $this->initialized['expiredOn'] = true;
        $this->expiredOn = $expiredOn;

        return $this;
    }

    /**
     * List of license types.
     *
     * @return list<string>|null
     */
    public function getLicenseType(): ?array
    {
        return $this->licenseType;
    }

    /**
     * List of license types.
     *
     * @param list<string>|null $licenseType
     */
    public function setLicenseType(?array $licenseType): self
    {
        $this->initialized['licenseType'] = true;
        $this->licenseType = $licenseType;

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
