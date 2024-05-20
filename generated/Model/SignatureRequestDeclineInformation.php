<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestDeclineInformation extends \ArrayObject
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
    protected $signerId;
    /**
     * @var string|null
     */
    protected $reason;
    /**
     * @var \DateTime|null
     */
    protected $declinedAt;

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    public function getDeclinedAt(): ?\DateTime
    {
        return $this->declinedAt;
    }

    public function setDeclinedAt(?\DateTime $declinedAt): self
    {
        $this->initialized['declinedAt'] = true;
        $this->declinedAt = $declinedAt;

        return $this;
    }
}
