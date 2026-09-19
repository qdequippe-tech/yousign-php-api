<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ProofOfAddressVerificationFullAllOfDataExtractedFromDocument implements AdditionalPropertiesInterface
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
     * If found, the first name as it appeared on the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * If found, the last name as it appeared on the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * If found, the address as it appeared on the document.
     *
     * @var string|null
     */
    protected $fullAddress;
    /**
     * If found, the document's issuance date as it appeared on the document.
     *
     * @var \DateTime|null
     */
    protected $issuedOn;
    /**
     * The type of document that was verified.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Data extracted from the 2D-Doc if the document has one.
     *
     * @var ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc|null
     */
    protected $n2dDoc;

    /**
     * If found, the first name as it appeared on the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * If found, the first name as it appeared on the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * If found, the last name as it appeared on the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * If found, the last name as it appeared on the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * If found, the address as it appeared on the document.
     */
    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    /**
     * If found, the address as it appeared on the document.
     */
    public function setFullAddress(?string $fullAddress): self
    {
        $this->initialized['fullAddress'] = true;
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * If found, the document's issuance date as it appeared on the document.
     */
    public function getIssuedOn(): ?\DateTime
    {
        return $this->issuedOn;
    }

    /**
     * If found, the document's issuance date as it appeared on the document.
     */
    public function setIssuedOn(?\DateTime $issuedOn): self
    {
        $this->initialized['issuedOn'] = true;
        $this->issuedOn = $issuedOn;

        return $this;
    }

    /**
     * The type of document that was verified.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The type of document that was verified.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Data extracted from the 2D-Doc if the document has one.
     */
    public function get2dDoc(): ?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc
    {
        return $this->n2dDoc;
    }

    /**
     * Data extracted from the 2D-Doc if the document has one.
     */
    public function set2dDoc(?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc $n2dDoc): self
    {
        $this->initialized['n2dDoc'] = true;
        $this->n2dDoc = $n2dDoc;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'fullAddress' => ['full_address', 'getFullAddress', 'setFullAddress'], 'issuedOn' => ['issued_on', 'getIssuedOn', 'setIssuedOn'], 'documentType' => ['document_type', 'getDocumentType', 'setDocumentType'], 'n2dDoc' => ['2d_doc', 'get2dDoc', 'set2dDoc']];
    }
}
