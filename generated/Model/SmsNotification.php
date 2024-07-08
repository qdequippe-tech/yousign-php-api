<?php

namespace Qdequippe\Yousign\Api\Model;

class SmsNotification extends \ArrayObject
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
     * @var OtpMessage|null
     */
    protected $otpMessage;

    public function getOtpMessage(): ?OtpMessage
    {
        return $this->otpMessage;
    }

    public function setOtpMessage(?OtpMessage $otpMessage): self
    {
        $this->initialized['otpMessage'] = true;
        $this->otpMessage = $otpMessage;

        return $this;
    }
}
