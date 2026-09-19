<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestActivatedDocumentsInner implements AdditionalPropertiesInterface
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
     * Unique identifier of the Document.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Nature of the Document (e.g. `attachment`, `signable_document`).
     *
     * @var string|null
     */
    protected $nature;

    /**
     * Unique identifier of the Document.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Document.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Nature of the Document (e.g. `attachment`, `signable_document`).
     */
    public function getNature(): ?string
    {
        return $this->nature;
    }

    /**
     * Nature of the Document (e.g. `attachment`, `signable_document`).
     */
    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'nature' => ['nature', 'getNature', 'setNature']];
    }
}
