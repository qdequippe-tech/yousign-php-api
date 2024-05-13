<?php

namespace Qdequippe\Yousign\Api\Model;

class RadioGroup extends \ArrayObject
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
}
