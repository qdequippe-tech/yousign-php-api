<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateElectronicSealPayload extends \ArrayObject
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
     * Specify which Electronic Seal Document to use for creating an Electronic Seal.
     *
     * @var string|null
     */
    protected $documentId;
    /**
     * Specify which Electronic Seal Image to use for creating an Electronic Seal.
     *
     * @var string|null
     */
    protected $imageId;
    /**
     * Store a custom id that will be added to webhooks.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * @var list<array<string, mixed>>|null
     */
    protected $fields;
    /**
     * @var string|null
     */
    protected $signatureLevel;
    /**
     * Specify which certificate to use for creating an Electronic Seal (only available for advanced_electronic_signature level).
     *
     * @var string|null
     */
    protected $certificateId;

    /**
     * Specify which Electronic Seal Document to use for creating an Electronic Seal.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Specify which Electronic Seal Document to use for creating an Electronic Seal.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Specify which Electronic Seal Image to use for creating an Electronic Seal.
     */
    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    /**
     * Specify which Electronic Seal Image to use for creating an Electronic Seal.
     */
    public function setImageId(?string $imageId): self
    {
        $this->initialized['imageId'] = true;
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Store a custom id that will be added to webhooks.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Store a custom id that will be added to webhooks.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return list<array<string, mixed>>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param list<array<string, mixed>>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    public function setSignatureLevel(?string $signatureLevel): self
    {
        $this->initialized['signatureLevel'] = true;
        $this->signatureLevel = $signatureLevel;

        return $this;
    }

    /**
     * Specify which certificate to use for creating an Electronic Seal (only available for advanced_electronic_signature level).
     */
    public function getCertificateId(): ?string
    {
        return $this->certificateId;
    }

    /**
     * Specify which certificate to use for creating an Electronic Seal (only available for advanced_electronic_signature level).
     */
    public function setCertificateId(?string $certificateId): self
    {
        $this->initialized['certificateId'] = true;
        $this->certificateId = $certificateId;

        return $this;
    }
}
