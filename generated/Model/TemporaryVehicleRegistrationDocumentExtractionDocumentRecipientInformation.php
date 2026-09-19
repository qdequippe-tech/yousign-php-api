<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation implements AdditionalPropertiesInterface
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
     * Full name of the document recipient extracted from the document.
     *
     * @var string|null
     */
    protected $documentRecipientFullName;
    /**
     * Address of the document recipient extracted from the document.
     *
     * @var string|null
     */
    protected $documentRecipientAddress;
    /**
     * Birth date of the document recipient extracted from the document.
     *
     * @var string|null
     */
    protected $documentRecipientBirthDate;
    /**
     * Birth city of the document recipient extracted from the document.
     *
     * @var string|null
     */
    protected $documentRecipientBirthCity;

    /**
     * Full name of the document recipient extracted from the document.
     */
    public function getDocumentRecipientFullName(): ?string
    {
        return $this->documentRecipientFullName;
    }

    /**
     * Full name of the document recipient extracted from the document.
     */
    public function setDocumentRecipientFullName(?string $documentRecipientFullName): self
    {
        $this->initialized['documentRecipientFullName'] = true;
        $this->documentRecipientFullName = $documentRecipientFullName;

        return $this;
    }

    /**
     * Address of the document recipient extracted from the document.
     */
    public function getDocumentRecipientAddress(): ?string
    {
        return $this->documentRecipientAddress;
    }

    /**
     * Address of the document recipient extracted from the document.
     */
    public function setDocumentRecipientAddress(?string $documentRecipientAddress): self
    {
        $this->initialized['documentRecipientAddress'] = true;
        $this->documentRecipientAddress = $documentRecipientAddress;

        return $this;
    }

    /**
     * Birth date of the document recipient extracted from the document.
     */
    public function getDocumentRecipientBirthDate(): ?string
    {
        return $this->documentRecipientBirthDate;
    }

    /**
     * Birth date of the document recipient extracted from the document.
     */
    public function setDocumentRecipientBirthDate(?string $documentRecipientBirthDate): self
    {
        $this->initialized['documentRecipientBirthDate'] = true;
        $this->documentRecipientBirthDate = $documentRecipientBirthDate;

        return $this;
    }

    /**
     * Birth city of the document recipient extracted from the document.
     */
    public function getDocumentRecipientBirthCity(): ?string
    {
        return $this->documentRecipientBirthCity;
    }

    /**
     * Birth city of the document recipient extracted from the document.
     */
    public function setDocumentRecipientBirthCity(?string $documentRecipientBirthCity): self
    {
        $this->initialized['documentRecipientBirthCity'] = true;
        $this->documentRecipientBirthCity = $documentRecipientBirthCity;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentRecipientFullName' => ['document_recipient_full_name', 'getDocumentRecipientFullName', 'setDocumentRecipientFullName'], 'documentRecipientAddress' => ['document_recipient_address', 'getDocumentRecipientAddress', 'setDocumentRecipientAddress'], 'documentRecipientBirthDate' => ['document_recipient_birth_date', 'getDocumentRecipientBirthDate', 'setDocumentRecipientBirthDate'], 'documentRecipientBirthCity' => ['document_recipient_birth_city', 'getDocumentRecipientBirthCity', 'setDocumentRecipientBirthCity']];
    }
}
