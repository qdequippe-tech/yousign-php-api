<?php

namespace Qdequippe\Yousign\Api\Model;

class IdDocumentExtraction
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
     * The first name of the document holder, extracted from the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The last name of the document holder, extracted from the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The birth name of the document holder, extracted from the document.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * The birth date of the document holder, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $birthDate;
    /**
     * The birth location of the document holder, extracted from the document.
     *
     * @var string|null
     */
    protected $birthLocation;
    /**
     * The gender of the document holder, extracted from the document (`m`, `f` or `x`).
     *
     * @var string|null
     */
    protected $gender;
    /**
     * The address of the document holder, extracted from the document.
     *
     * @var IdDocumentExtractionAddress|null
     */
    protected $address;
    /**
     * The detected classification label of the document.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * The issuing country code extracted from the document.
     *
     * @var string|null
     */
    protected $issuingCountryCode;
    /**
     * The date the document was issued, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * The expiration date of the document, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * The document number, extracted from the document.
     *
     * @var string|null
     */
    protected $documentNumber;
    /**
     * The Machine Readable Zone (MRZ) lines, extracted from the document.
     *
     * @var IdDocumentExtractionMrz|null
     */
    protected $mrz;

    /**
     * The first name of the document holder, extracted from the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The first name of the document holder, extracted from the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The last name of the document holder, extracted from the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The last name of the document holder, extracted from the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The birth name of the document holder, extracted from the document.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * The birth name of the document holder, extracted from the document.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->initialized['birthName'] = true;
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * The birth date of the document holder, extracted from the document.
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * The birth date of the document holder, extracted from the document.
     */
    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->initialized['birthDate'] = true;
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * The birth location of the document holder, extracted from the document.
     */
    public function getBirthLocation(): ?string
    {
        return $this->birthLocation;
    }

    /**
     * The birth location of the document holder, extracted from the document.
     */
    public function setBirthLocation(?string $birthLocation): self
    {
        $this->initialized['birthLocation'] = true;
        $this->birthLocation = $birthLocation;

        return $this;
    }

    /**
     * The gender of the document holder, extracted from the document (`m`, `f` or `x`).
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * The gender of the document holder, extracted from the document (`m`, `f` or `x`).
     */
    public function setGender(?string $gender): self
    {
        $this->initialized['gender'] = true;
        $this->gender = $gender;

        return $this;
    }

    /**
     * The address of the document holder, extracted from the document.
     */
    public function getAddress(): ?IdDocumentExtractionAddress
    {
        return $this->address;
    }

    /**
     * The address of the document holder, extracted from the document.
     */
    public function setAddress(?IdDocumentExtractionAddress $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }

    /**
     * The detected classification label of the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The detected classification label of the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * The issuing country code extracted from the document.
     */
    public function getIssuingCountryCode(): ?string
    {
        return $this->issuingCountryCode;
    }

    /**
     * The issuing country code extracted from the document.
     */
    public function setIssuingCountryCode(?string $issuingCountryCode): self
    {
        $this->initialized['issuingCountryCode'] = true;
        $this->issuingCountryCode = $issuingCountryCode;

        return $this;
    }

    /**
     * The date the document was issued, extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The date the document was issued, extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * The expiration date of the document, extracted from the document.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * The expiration date of the document, extracted from the document.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * The document number, extracted from the document.
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * The document number, extracted from the document.
     */
    public function setDocumentNumber(?string $documentNumber): self
    {
        $this->initialized['documentNumber'] = true;
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * The Machine Readable Zone (MRZ) lines, extracted from the document.
     */
    public function getMrz(): ?IdDocumentExtractionMrz
    {
        return $this->mrz;
    }

    /**
     * The Machine Readable Zone (MRZ) lines, extracted from the document.
     */
    public function setMrz(?IdDocumentExtractionMrz $mrz): self
    {
        $this->initialized['mrz'] = true;
        $this->mrz = $mrz;

        return $this;
    }
}
