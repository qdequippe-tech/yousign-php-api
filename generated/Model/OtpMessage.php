<?php

namespace Qdequippe\Yousign\Api\Model;

class OtpMessage extends \ArrayObject
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
     * Custom text that will be sent as a custom OTP SMS to the recipient.
     *
     * @var string|null
     */
    protected $customText;

    /**
     * Custom text that will be sent as a custom OTP SMS to the recipient.
     */
    public function getCustomText(): ?string
    {
        return $this->customText;
    }

    /**
     * Custom text that will be sent as a custom OTP SMS to the recipient.
     */
    public function setCustomText(?string $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }
}
