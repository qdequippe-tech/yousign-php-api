<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class RadioGroup2 implements AdditionalPropertiesInterface
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
     * Identifier of the Document the radio group Field is placed on.
     *
     * @var string|null
     */
    protected $documentId;
    /**
     * Field type discriminator.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Page number where the Field is placed.
     *
     * @var int|null
     */
    protected $page;
    /**
     * Whether selecting a radio is optional.
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Radio group's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * If set to `true`, the radio button cannot be modified by the Signer.
     *
     * @var bool|null
     */
    protected $readOnly = false;
    /**
     * List of radio buttons in the group.
     *
     * @var list<RadioGroup2RadiosInner>|null
     */
    protected $radios;

    /**
     * Identifier of the Document the radio group Field is placed on.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Identifier of the Document the radio group Field is placed on.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Field type discriminator.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Field type discriminator.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Page number where the Field is placed.
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * Page number where the Field is placed.
     */
    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Whether selecting a radio is optional.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Whether selecting a radio is optional.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

        return $this;
    }

    /**
     * Radio group's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Radio group's name.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * If set to `true`, the radio button cannot be modified by the Signer.
     */
    public function getReadOnly(): ?bool
    {
        return $this->readOnly;
    }

    /**
     * If set to `true`, the radio button cannot be modified by the Signer.
     */
    public function setReadOnly(?bool $readOnly): self
    {
        $this->initialized['readOnly'] = true;
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * List of radio buttons in the group.
     *
     * @return list<RadioGroup2RadiosInner>|null
     */
    public function getRadios(): ?array
    {
        return $this->radios;
    }

    /**
     * List of radio buttons in the group.
     *
     * @param list<RadioGroup2RadiosInner>|null $radios
     */
    public function setRadios(?array $radios): self
    {
        $this->initialized['radios'] = true;
        $this->radios = $radios;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'name' => ['name', 'getName', 'setName'], 'readOnly' => ['read_only', 'getReadOnly', 'setReadOnly'], 'radios' => ['radios', 'getRadios', 'setRadios']];
    }
}
