<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestDeclineInformation implements AdditionalPropertiesInterface
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
     * Identifier of the Signer who declined.
     *
     * @var string|null
     */
    protected $signerId;
    /**
     * Reason given for declining.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Timestamp when the Signer declined.
     *
     * @var \DateTime|null
     */
    protected $declinedAt;

    /**
     * Identifier of the Signer who declined.
     */
    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    /**
     * Identifier of the Signer who declined.
     */
    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

        return $this;
    }

    /**
     * Reason given for declining.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Reason given for declining.
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    /**
     * Timestamp when the Signer declined.
     */
    public function getDeclinedAt(): ?\DateTime
    {
        return $this->declinedAt;
    }

    /**
     * Timestamp when the Signer declined.
     */
    public function setDeclinedAt(?\DateTime $declinedAt): self
    {
        $this->initialized['declinedAt'] = true;
        $this->declinedAt = $declinedAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'reason' => ['reason', 'getReason', 'setReason'], 'declinedAt' => ['declined_at', 'getDeclinedAt', 'setDeclinedAt']];
    }
}
