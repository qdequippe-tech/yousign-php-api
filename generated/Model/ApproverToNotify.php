<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ApproverToNotify implements AdditionalPropertiesInterface
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
     * Unique identifier of the Approver.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Current status of the Approver.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Approval link for the Approver; `null` when `delivery_mode` is `email`.
     *
     * @var string|null
     */
    protected $approvalLink;
    /**
     * Expiration timestamp of the approval link.
     *
     * @var \DateTime|null
     */
    protected $approvalLinkExpirationDate;

    /**
     * Unique identifier of the Approver.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Approver.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Current status of the Approver.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Current status of the Approver.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Approval link for the Approver; `null` when `delivery_mode` is `email`.
     */
    public function getApprovalLink(): ?string
    {
        return $this->approvalLink;
    }

    /**
     * Approval link for the Approver; `null` when `delivery_mode` is `email`.
     */
    public function setApprovalLink(?string $approvalLink): self
    {
        $this->initialized['approvalLink'] = true;
        $this->approvalLink = $approvalLink;

        return $this;
    }

    /**
     * Expiration timestamp of the approval link.
     */
    public function getApprovalLinkExpirationDate(): ?\DateTime
    {
        return $this->approvalLinkExpirationDate;
    }

    /**
     * Expiration timestamp of the approval link.
     */
    public function setApprovalLinkExpirationDate(?\DateTime $approvalLinkExpirationDate): self
    {
        $this->initialized['approvalLinkExpirationDate'] = true;
        $this->approvalLinkExpirationDate = $approvalLinkExpirationDate;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'status' => ['status', 'getStatus', 'setStatus'], 'approvalLink' => ['approval_link', 'getApprovalLink', 'setApprovalLink'], 'approvalLinkExpirationDate' => ['approval_link_expiration_date', 'getApprovalLinkExpirationDate', 'setApprovalLinkExpirationDate']];
    }
}
