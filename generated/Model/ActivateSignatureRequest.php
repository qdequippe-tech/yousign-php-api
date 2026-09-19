<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ActivateSignatureRequest implements AdditionalPropertiesInterface
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
     * The Id of the User that should be considered as the Signature Request sender.
     * They must be part of the Workspace of the Signature Request and be active.
     * Mandatory with `sender_type: "user"`, must be omitted otherwise.
     *
     * @var string|null
     */
    protected $senderId;

    /**
     * The Id of the User that should be considered as the Signature Request sender.
     * They must be part of the Workspace of the Signature Request and be active.
     * Mandatory with `sender_type: "user"`, must be omitted otherwise.
     */
    public function getSenderId(): ?string
    {
        return $this->senderId;
    }

    /**
     * The Id of the User that should be considered as the Signature Request sender.
     * They must be part of the Workspace of the Signature Request and be active.
     * Mandatory with `sender_type: "user"`, must be omitted otherwise.
     */
    public function setSenderId(?string $senderId): self
    {
        $this->initialized['senderId'] = true;
        $this->senderId = $senderId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['senderId' => ['sender_id', 'getSenderId', 'setSenderId']];
    }
}
