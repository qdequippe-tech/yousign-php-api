<?php

namespace Qdequippe\Yousign\Api\Model;

class GermanProofOfAddressExtraction
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
     * The first name of the registered person, extracted from the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The last name of the registered person, extracted from the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The full main residence address extracted from the document.
     *
     * @var string|null
     */
    protected $fullAddress;
    /**
     * The date since when the person has been living at the main residence (Einzugsdatum), extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $residenceStartDate;
    /**
     * The date the certificate was issued (Ausstellungsdatum), extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The first name of the registered person, extracted from the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The first name of the registered person, extracted from the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The last name of the registered person, extracted from the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The last name of the registered person, extracted from the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The full main residence address extracted from the document.
     */
    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    /**
     * The full main residence address extracted from the document.
     */
    public function setFullAddress(?string $fullAddress): self
    {
        $this->initialized['fullAddress'] = true;
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * The date since when the person has been living at the main residence (Einzugsdatum), extracted from the document.
     */
    public function getResidenceStartDate(): ?\DateTime
    {
        return $this->residenceStartDate;
    }

    /**
     * The date since when the person has been living at the main residence (Einzugsdatum), extracted from the document.
     */
    public function setResidenceStartDate(?\DateTime $residenceStartDate): self
    {
        $this->initialized['residenceStartDate'] = true;
        $this->residenceStartDate = $residenceStartDate;

        return $this;
    }

    /**
     * The date the certificate was issued (Ausstellungsdatum), extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The date the certificate was issued (Ausstellungsdatum), extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * The document type extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
