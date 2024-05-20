<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerSign extends \ArrayObject
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
     * @var string|null
     */
    protected $otp;
    /**
     * @var mixed|null
     */
    protected $ipAddress;
    /**
     * @var \DateTime|null
     */
    protected $consentGivenAt;

    public function getOtp(): ?string
    {
        return $this->otp;
    }

    public function setOtp(?string $otp): self
    {
        $this->initialized['otp'] = true;
        $this->otp = $otp;

        return $this;
    }

    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function setIpAddress($ipAddress): self
    {
        $this->initialized['ipAddress'] = true;
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getConsentGivenAt(): ?\DateTime
    {
        return $this->consentGivenAt;
    }

    public function setConsentGivenAt(?\DateTime $consentGivenAt): self
    {
        $this->initialized['consentGivenAt'] = true;
        $this->consentGivenAt = $consentGivenAt;

        return $this;
    }
}
