<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestEmailNotification implements AdditionalPropertiesInterface
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
     * Email sender configuration.
     *
     * @var SignatureRequestEmailNotificationSender|null
     */
    protected $sender;
    /**
     * Custom note included in notification emails.
     *
     * @var string|null
     */
    protected $customNote;

    /**
     * Email sender configuration.
     */
    public function getSender(): ?SignatureRequestEmailNotificationSender
    {
        return $this->sender;
    }

    /**
     * Email sender configuration.
     */
    public function setSender(?SignatureRequestEmailNotificationSender $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;

        return $this;
    }

    /**
     * Custom note included in notification emails.
     */
    public function getCustomNote(): ?string
    {
        return $this->customNote;
    }

    /**
     * Custom note included in notification emails.
     */
    public function setCustomNote(?string $customNote): self
    {
        $this->initialized['customNote'] = true;
        $this->customNote = $customNote;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['sender' => ['sender', 'getSender', 'setSender'], 'customNote' => ['custom_note', 'getCustomNote', 'setCustomNote']];
    }
}
