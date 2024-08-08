<?php

namespace Qdequippe\Yousign\Api\Model;

class SmsNotification1 extends \ArrayObject
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
     * @var OTPMessage|null
     */
    protected $otpMessage;

    public function getOtpMessage(): ?OTPMessage
    {
        return $this->otpMessage;
    }

    public function setOtpMessage(?OTPMessage $otpMessage): self
    {
        $this->initialized['otpMessage'] = true;
        $this->otpMessage = $otpMessage;

        return $this;
    }
}
