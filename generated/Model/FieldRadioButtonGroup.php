<?php

namespace Qdequippe\Yousign\Api\Model;

class FieldRadioButtonGroup extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $documentId;
    /**
     * @var string|null
     */
    protected $signerId;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var int|null
     */
    protected $page;
    /**
     * Does the Signer has to select one of the radio buttons from this group?
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var list<FieldRadioButtonGroupRadiosInner>|null
     */
    protected $radios;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Does the Signer has to select one of the radio buttons from this group?
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Does the Signer has to select one of the radio buttons from this group?
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

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

    /**
     * @return list<FieldRadioButtonGroupRadiosInner>|null
     */
    public function getRadios(): ?array
    {
        return $this->radios;
    }

    /**
     * @param list<FieldRadioButtonGroupRadiosInner>|null $radios
     */
    public function setRadios(?array $radios): self
    {
        $this->initialized['radios'] = true;
        $this->radios = $radios;

        return $this;
    }
}
