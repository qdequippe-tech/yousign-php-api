<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateSignerDocumentRequest implements AdditionalPropertiesInterface
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
     * Title of the Signer Document Request.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Define if the document request is optional for the Signers.
     *
     * @var bool|null
     */
    protected $optional;

    /**
     * Title of the Signer Document Request.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Title of the Signer Document Request.
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * Define if the document request is optional for the Signers.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Define if the document request is optional for the Signers.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['title' => ['title', 'getTitle', 'setTitle'], 'optional' => ['optional', 'getOptional', 'setOptional']];
    }
}
