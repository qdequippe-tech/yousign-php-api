<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestInListSignersInner implements AdditionalPropertiesInterface
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
     * Unique identifier of the Signer.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Current status of the Signer.
     *
     * @var string|null
     */
    protected $status;

    /**
     * Unique identifier of the Signer.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Signer.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Current status of the Signer.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Current status of the Signer.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'status' => ['status', 'getStatus', 'setStatus']];
    }
}
