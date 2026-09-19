<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateSignerDocumentRequest implements AdditionalPropertiesInterface
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
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
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

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
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

    public function definedProperties(): array
    {
        return ['title' => ['title', 'getTitle', 'setTitle'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'signerIds' => ['signer_ids', 'getSignerIds', 'setSignerIds']];
    }
}
