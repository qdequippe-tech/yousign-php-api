<?php

namespace Qdequippe\Yousign\Api\Model;

class IdDocumentVerificationExtractedFromDocument extends \ArrayObject
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
     * The holder first name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The holder birth name.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * The holder last name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Birth date on the document.
     *
     * @var \DateTime|null
     */
    protected $birthDate;
    /**
     * The holder birth place.
     *
     * @var string|null
     */
    protected $birthPlace;
    /**
     * The holder gender. "m" Masculine, "f" Feminine, "x" Non defined.
     *
     * @var string|null
     */
    protected $gender;
    /**
     * The holder postal address.
     *
     * @var string|null
     */
    protected $postalAddress;
    /**
     * The document type.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Issuance country code (2 upper case letters).
     *
     * @var string|null
     */
    protected $documentIssuingCountry;
    /**
     * Document issuance date.
     *
     * @var \DateTime|null
     */
    protected $documentIssuingDate;
    /**
     * Document legal expiration date.
     *
     * @var \DateTime|null
     */
    protected $documentExpirationDate;
    /**
     * Document identifier number (may contain letters).
     *
     * @var string|null
     */
    protected $documentNumber;
    /**
     * Machine Readable Zone content.
     *
     * @var IdDocumentVerificationExtractedFromDocumentMrz|null
     */
    protected $mrz;

    /**
     * The holder first name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The holder first name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The holder birth name.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * The holder birth name.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->initialized['birthName'] = true;
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * The holder last name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The holder last name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Birth date on the document.
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * Birth date on the document.
     */
    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->initialized['birthDate'] = true;
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * The holder birth place.
     */
    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    /**
     * The holder birth place.
     */
    public function setBirthPlace(?string $birthPlace): self
    {
        $this->initialized['birthPlace'] = true;
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * The holder gender. "m" Masculine, "f" Feminine, "x" Non defined.
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * The holder gender. "m" Masculine, "f" Feminine, "x" Non defined.
     */
    public function setGender(?string $gender): self
    {
        $this->initialized['gender'] = true;
        $this->gender = $gender;

        return $this;
    }

    /**
     * The holder postal address.
     */
    public function getPostalAddress(): ?string
    {
        return $this->postalAddress;
    }

    /**
     * The holder postal address.
     */
    public function setPostalAddress(?string $postalAddress): self
    {
        $this->initialized['postalAddress'] = true;
        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * The document type.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Issuance country code (2 upper case letters).
     */
    public function getDocumentIssuingCountry(): ?string
    {
        return $this->documentIssuingCountry;
    }

    /**
     * Issuance country code (2 upper case letters).
     */
    public function setDocumentIssuingCountry(?string $documentIssuingCountry): self
    {
        $this->initialized['documentIssuingCountry'] = true;
        $this->documentIssuingCountry = $documentIssuingCountry;

        return $this;
    }

    /**
     * Document issuance date.
     */
    public function getDocumentIssuingDate(): ?\DateTime
    {
        return $this->documentIssuingDate;
    }

    /**
     * Document issuance date.
     */
    public function setDocumentIssuingDate(?\DateTime $documentIssuingDate): self
    {
        $this->initialized['documentIssuingDate'] = true;
        $this->documentIssuingDate = $documentIssuingDate;

        return $this;
    }

    /**
     * Document legal expiration date.
     */
    public function getDocumentExpirationDate(): ?\DateTime
    {
        return $this->documentExpirationDate;
    }

    /**
     * Document legal expiration date.
     */
    public function setDocumentExpirationDate(?\DateTime $documentExpirationDate): self
    {
        $this->initialized['documentExpirationDate'] = true;
        $this->documentExpirationDate = $documentExpirationDate;

        return $this;
    }

    /**
     * Document identifier number (may contain letters).
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * Document identifier number (may contain letters).
     */
    public function setDocumentNumber(?string $documentNumber): self
    {
        $this->initialized['documentNumber'] = true;
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * Machine Readable Zone content.
     */
    public function getMrz(): ?IdDocumentVerificationExtractedFromDocumentMrz
    {
        return $this->mrz;
    }

    /**
     * Machine Readable Zone content.
     */
    public function setMrz(?IdDocumentVerificationExtractedFromDocumentMrz $mrz): self
    {
        $this->initialized['mrz'] = true;
        $this->mrz = $mrz;

        return $this;
    }
}
