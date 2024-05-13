<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestEmailNotification extends \ArrayObject
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
     * @var SignatureRequestEmailNotificationSender|null
     */
    protected $sender;

    public function getSender(): ?SignatureRequestEmailNotificationSender
    {
        return $this->sender;
    }

    public function setSender(?SignatureRequestEmailNotificationSender $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;

        return $this;
    }
}
