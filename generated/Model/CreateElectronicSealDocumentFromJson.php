<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateElectronicSealDocumentFromJson extends \ArrayObject
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
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     *
     * @var string|null
     */
    protected $electronicSealDocumentId;

    /**
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     */
    public function getElectronicSealDocumentId(): ?string
    {
        return $this->electronicSealDocumentId;
    }

    /**
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     */
    public function setElectronicSealDocumentId(?string $electronicSealDocumentId): self
    {
        $this->initialized['electronicSealDocumentId'] = true;
        $this->electronicSealDocumentId = $electronicSealDocumentId;

        return $this;
    }
}
