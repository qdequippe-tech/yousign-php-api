<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Approver implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var ApproverInfo|null
     */
    protected $info;
    /**
     * @var string|null
     */
    protected $approvalLink;
    /**
     * @var \DateTime|null
     */
    protected $approvalLinkExpirationDate;
    /**
     * Custom Text.
     *
     * @var CustomText|null
     */
    protected $customText;
    /**
     * @var \DateTime|null
     */
    protected $approvedAt;
    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     *
     * @var int|null
     */
    protected $recipientStageIndex;
    /**
     * List of Document IDs not visible to this Approver.
     *
     * @var list<string>|null
     */
    protected $excludedDocuments;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getInfo(): ?ApproverInfo
    {
        return $this->info;
    }

    public function setInfo(?ApproverInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function getApprovalLink(): ?string
    {
        return $this->approvalLink;
    }

    public function setApprovalLink(?string $approvalLink): self
    {
        $this->initialized['approvalLink'] = true;
        $this->approvalLink = $approvalLink;

        return $this;
    }

    public function getApprovalLinkExpirationDate(): ?\DateTime
    {
        return $this->approvalLinkExpirationDate;
    }

    public function setApprovalLinkExpirationDate(?\DateTime $approvalLinkExpirationDate): self
    {
        $this->initialized['approvalLinkExpirationDate'] = true;
        $this->approvalLinkExpirationDate = $approvalLinkExpirationDate;

        return $this;
    }

    /**
     * Custom Text.
     */
    public function getCustomText(): ?CustomText
    {
        return $this->customText;
    }

    /**
     * Custom Text.
     */
    public function setCustomText(?CustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    public function getApprovedAt(): ?\DateTime
    {
        return $this->approvedAt;
    }

    public function setApprovedAt(?\DateTime $approvedAt): self
    {
        $this->initialized['approvedAt'] = true;
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     */
    public function getRecipientStageIndex(): ?int
    {
        return $this->recipientStageIndex;
    }

    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     */
    public function setRecipientStageIndex(?int $recipientStageIndex): self
    {
        $this->initialized['recipientStageIndex'] = true;
        $this->recipientStageIndex = $recipientStageIndex;

        return $this;
    }

    /**
     * List of Document IDs not visible to this Approver.
     *
     * @return list<string>|null
     */
    public function getExcludedDocuments(): ?array
    {
        return $this->excludedDocuments;
    }

    /**
     * List of Document IDs not visible to this Approver.
     *
     * @param list<string>|null $excludedDocuments
     */
    public function setExcludedDocuments(?array $excludedDocuments): self
    {
        $this->initialized['excludedDocuments'] = true;
        $this->excludedDocuments = $excludedDocuments;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'status' => ['status', 'getStatus', 'setStatus'], 'info' => ['info', 'getInfo', 'setInfo'], 'approvalLink' => ['approval_link', 'getApprovalLink', 'setApprovalLink'], 'approvalLinkExpirationDate' => ['approval_link_expiration_date', 'getApprovalLinkExpirationDate', 'setApprovalLinkExpirationDate'], 'customText' => ['custom_text', 'getCustomText', 'setCustomText'], 'approvedAt' => ['approved_at', 'getApprovedAt', 'setApprovedAt'], 'recipientStageIndex' => ['recipient_stage_index', 'getRecipientStageIndex', 'setRecipientStageIndex'], 'excludedDocuments' => ['excluded_documents', 'getExcludedDocuments', 'setExcludedDocuments']];
    }
}
