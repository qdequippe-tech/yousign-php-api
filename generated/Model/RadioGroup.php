<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class RadioGroup implements AdditionalPropertiesInterface
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
     * @var bool|null
     */
    protected $optional = false;
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
     * @var list<RadioGroupRadiosInner>|null
     */
    protected $radios;

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

    public function getOptional(): ?bool
    {
        return $this->optional;
    }

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
     * @return list<RadioGroupRadiosInner>|null
     */
    public function getRadios(): ?array
    {
        return $this->radios;
    }

    /**
     * @param list<RadioGroupRadiosInner>|null $radios
     */
    public function setRadios(?array $radios): self
    {
        $this->initialized['radios'] = true;
        $this->radios = $radios;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'name' => ['name', 'getName', 'setName'], 'readOnly' => ['read_only', 'getReadOnly', 'setReadOnly'], 'radios' => ['radios', 'getRadios', 'setRadios']];
    }
}
