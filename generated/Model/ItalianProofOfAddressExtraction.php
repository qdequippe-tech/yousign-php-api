<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianProofOfAddressExtraction
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
     * The first name of the certificate holder, extracted from the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The last name of the certificate holder, extracted from the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The full residence address extracted from the document.
     *
     * @var string|null
     */
    protected $fullAddress;
    /**
     * The date the certificate was issued, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Whether a qualified electronic seal or official stamp (Ministero dell'Interno / ANPR) was detected on the document.
     *
     * @var bool|null
     */
    protected $sealPresent;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The first name of the certificate holder, extracted from the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The first name of the certificate holder, extracted from the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The last name of the certificate holder, extracted from the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The last name of the certificate holder, extracted from the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The full residence address extracted from the document.
     */
    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    /**
     * The full residence address extracted from the document.
     */
    public function setFullAddress(?string $fullAddress): self
    {
        $this->initialized['fullAddress'] = true;
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * The date the certificate was issued, extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The date the certificate was issued, extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * Whether a qualified electronic seal or official stamp (Ministero dell'Interno / ANPR) was detected on the document.
     */
    public function getSealPresent(): ?bool
    {
        return $this->sealPresent;
    }

    /**
     * Whether a qualified electronic seal or official stamp (Ministero dell'Interno / ANPR) was detected on the document.
     */
    public function setSealPresent(?bool $sealPresent): self
    {
        $this->initialized['sealPresent'] = true;
        $this->sealPresent = $sealPresent;

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
