<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class FromSignatureRequestDocument implements AdditionalPropertiesInterface
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
     * Id of the Signature Request Document, the Signature Request must be Done.
     *
     * @var string|null
     */
    protected $signatureRequestDocumentId;

    /**
     * Id of the Signature Request Document, the Signature Request must be Done.
     */
    public function getSignatureRequestDocumentId(): ?string
    {
        return $this->signatureRequestDocumentId;
    }

    /**
     * Id of the Signature Request Document, the Signature Request must be Done.
     */
    public function setSignatureRequestDocumentId(?string $signatureRequestDocumentId): self
    {
        $this->initialized['signatureRequestDocumentId'] = true;
        $this->signatureRequestDocumentId = $signatureRequestDocumentId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signatureRequestDocumentId' => ['signature_request_document_id', 'getSignatureRequestDocumentId', 'setSignatureRequestDocumentId']];
    }
}
