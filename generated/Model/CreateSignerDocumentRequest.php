<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignerDocumentRequest extends \ArrayObject
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
    protected $title;
    /**
     * @var bool|null
     */
    protected $optional;
    /**
     * @var list<string>|null
     */
    protected $signerIds;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

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
     * @return list<string>|null
     */
    public function getSignerIds(): ?array
    {
        return $this->signerIds;
    }

    /**
     * @param list<string>|null $signerIds
     */
    public function setSignerIds(?array $signerIds): self
    {
        $this->initialized['signerIds'] = true;
        $this->signerIds = $signerIds;

        return $this;
    }
}
