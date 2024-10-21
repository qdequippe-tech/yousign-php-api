<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateDocumentFromJson extends \ArrayObject
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
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Document.
     *
     * @var string|null
     */
    protected $electronicSealDocumentId;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $nature;
    /**
     * Insert just after the position of the specified Document id.
     *
     * @var string|null
     */
    protected $insertAfterId;

    /**
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Document.
     */
    public function getElectronicSealDocumentId(): ?string
    {
        return $this->electronicSealDocumentId;
    }

    /**
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Document.
     */
    public function setElectronicSealDocumentId(?string $electronicSealDocumentId): self
    {
        $this->initialized['electronicSealDocumentId'] = true;
        $this->electronicSealDocumentId = $electronicSealDocumentId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    /**
     * Insert just after the position of the specified Document id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified Document id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }
}
