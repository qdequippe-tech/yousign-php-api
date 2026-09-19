<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestRejectionInformation implements AdditionalPropertiesInterface
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
     * Id of the Approver who rejected the Signature Request.
     *
     * @var string|null
     */
    protected $approverId;
    /**
     * Reason provided by the Approver explaining why they rejected the Signature Request.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Timestamp indicating when the Approver rejected the Signature Request.
     *
     * @var \DateTime|null
     */
    protected $rejectedAt;

    /**
     * Id of the Approver who rejected the Signature Request.
     */
    public function getApproverId(): ?string
    {
        return $this->approverId;
    }

    /**
     * Id of the Approver who rejected the Signature Request.
     */
    public function setApproverId(?string $approverId): self
    {
        $this->initialized['approverId'] = true;
        $this->approverId = $approverId;

        return $this;
    }

    /**
     * Reason provided by the Approver explaining why they rejected the Signature Request.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Reason provided by the Approver explaining why they rejected the Signature Request.
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    /**
     * Timestamp indicating when the Approver rejected the Signature Request.
     */
    public function getRejectedAt(): ?\DateTime
    {
        return $this->rejectedAt;
    }

    /**
     * Timestamp indicating when the Approver rejected the Signature Request.
     */
    public function setRejectedAt(?\DateTime $rejectedAt): self
    {
        $this->initialized['rejectedAt'] = true;
        $this->rejectedAt = $rejectedAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['approverId' => ['approver_id', 'getApproverId', 'setApproverId'], 'reason' => ['reason', 'getReason', 'setReason'], 'rejectedAt' => ['rejected_at', 'getRejectedAt', 'setRejectedAt']];
    }
}
