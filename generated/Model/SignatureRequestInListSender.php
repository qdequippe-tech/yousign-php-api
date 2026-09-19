<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestInListSender implements AdditionalPropertiesInterface
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
     * Unique identifier of the sender.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Email address of the sender.
     *
     * @var string|null
     */
    protected $email;

    /**
     * Unique identifier of the sender.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the sender.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Email address of the sender.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Email address of the sender.
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'email' => ['email', 'getEmail', 'setEmail']];
    }
}
