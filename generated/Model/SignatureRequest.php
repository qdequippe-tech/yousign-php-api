<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequest extends \ArrayObject
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
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Enable an ordered workflow, each signer will be requested to sign in a sequential order.
     *
     * @var bool|null
     */
    protected $orderedSigners;
    /**
     * @var SignatureRequestInListReminderSettings|null
     */
    protected $reminderSettings;
    /**
     * Time zone of the dates and times displayed in emails, the Signature Request expiration date, and the PDF Audit Trail. Format: tz database. Default is set to Europe/Paris.
     *
     * @var string|null
     */
    protected $timezone = 'Europe/Paris';
    /**
     * @deprecated
     *
     * @var string|null
     */
    protected $emailCustomNote;
    /**
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * @var string|null
     */
    protected $source;
    /**
     * @var list<SignatureRequestInListSignersInner>|null
     */
    protected $signers;
    /**
     * @var list<SignatureRequestInListApproversInner>|null
     */
    protected $approvers;
    /**
     * @var list<SignatureRequestInListDocumentsInner>|null
     */
    protected $documents;
    /**
     * @var SignatureRequestInListSender|null
     */
    protected $sender;
    /**
     * @var string|null
     */
    protected $externalId;
    /**
     * @deprecated
     *
     * @var string|null
     */
    protected $brandingId;
    /**
     * @var string|null
     */
    protected $customExperienceId;
    /**
     * @var bool|null
     */
    protected $signersAllowedToDecline;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * @var string|null
     */
    protected $auditTrailLocale;
    /**
     * @var SignatureRequestEmailNotification|null
     */
    protected $emailNotification;
    /**
     * @var string|null
     */
    protected $bulkSendBatchId;
    /**
     * @var SignatureRequestDeclineInformation|null
     */
    protected $declineInformation;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Enable an ordered workflow, each signer will be requested to sign in a sequential order.
     */
    public function getOrderedSigners(): ?bool
    {
        return $this->orderedSigners;
    }

    /**
     * Enable an ordered workflow, each signer will be requested to sign in a sequential order.
     */
    public function setOrderedSigners(?bool $orderedSigners): self
    {
        $this->initialized['orderedSigners'] = true;
        $this->orderedSigners = $orderedSigners;

        return $this;
    }

    public function getReminderSettings(): ?SignatureRequestInListReminderSettings
    {
        return $this->reminderSettings;
    }

    public function setReminderSettings(?SignatureRequestInListReminderSettings $reminderSettings): self
    {
        $this->initialized['reminderSettings'] = true;
        $this->reminderSettings = $reminderSettings;

        return $this;
    }

    /**
     * Time zone of the dates and times displayed in emails, the Signature Request expiration date, and the PDF Audit Trail. Format: tz database. Default is set to Europe/Paris.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Time zone of the dates and times displayed in emails, the Signature Request expiration date, and the PDF Audit Trail. Format: tz database. Default is set to Europe/Paris.
     */
    public function setTimezone(?string $timezone): self
    {
        $this->initialized['timezone'] = true;
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @deprecated
     */
    public function getEmailCustomNote(): ?string
    {
        return $this->emailCustomNote;
    }

    /**
     * @deprecated
     */
    public function setEmailCustomNote(?string $emailCustomNote): self
    {
        $this->initialized['emailCustomNote'] = true;
        $this->emailCustomNote = $emailCustomNote;

        return $this;
    }

    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * @return list<SignatureRequestInListSignersInner>|null
     */
    public function getSigners(): ?array
    {
        return $this->signers;
    }

    /**
     * @param list<SignatureRequestInListSignersInner>|null $signers
     */
    public function setSigners(?array $signers): self
    {
        $this->initialized['signers'] = true;
        $this->signers = $signers;

        return $this;
    }

    /**
     * @return list<SignatureRequestInListApproversInner>|null
     */
    public function getApprovers(): ?array
    {
        return $this->approvers;
    }

    /**
     * @param list<SignatureRequestInListApproversInner>|null $approvers
     */
    public function setApprovers(?array $approvers): self
    {
        $this->initialized['approvers'] = true;
        $this->approvers = $approvers;

        return $this;
    }

    /**
     * @return list<SignatureRequestInListDocumentsInner>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * @param list<SignatureRequestInListDocumentsInner>|null $documents
     */
    public function setDocuments(?array $documents): self
    {
        $this->initialized['documents'] = true;
        $this->documents = $documents;

        return $this;
    }

    public function getSender(): ?SignatureRequestInListSender
    {
        return $this->sender;
    }

    public function setSender(?SignatureRequestInListSender $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @deprecated
     */
    public function getBrandingId(): ?string
    {
        return $this->brandingId;
    }

    /**
     * @deprecated
     */
    public function setBrandingId(?string $brandingId): self
    {
        $this->initialized['brandingId'] = true;
        $this->brandingId = $brandingId;

        return $this;
    }

    public function getCustomExperienceId(): ?string
    {
        return $this->customExperienceId;
    }

    public function setCustomExperienceId(?string $customExperienceId): self
    {
        $this->initialized['customExperienceId'] = true;
        $this->customExperienceId = $customExperienceId;

        return $this;
    }

    public function getSignersAllowedToDecline(): ?bool
    {
        return $this->signersAllowedToDecline;
    }

    public function setSignersAllowedToDecline(?bool $signersAllowedToDecline): self
    {
        $this->initialized['signersAllowedToDecline'] = true;
        $this->signersAllowedToDecline = $signersAllowedToDecline;

        return $this;
    }

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    public function getAuditTrailLocale(): ?string
    {
        return $this->auditTrailLocale;
    }

    public function setAuditTrailLocale(?string $auditTrailLocale): self
    {
        $this->initialized['auditTrailLocale'] = true;
        $this->auditTrailLocale = $auditTrailLocale;

        return $this;
    }

    public function getEmailNotification(): ?SignatureRequestEmailNotification
    {
        return $this->emailNotification;
    }

    public function setEmailNotification(?SignatureRequestEmailNotification $emailNotification): self
    {
        $this->initialized['emailNotification'] = true;
        $this->emailNotification = $emailNotification;

        return $this;
    }

    public function getBulkSendBatchId(): ?string
    {
        return $this->bulkSendBatchId;
    }

    public function setBulkSendBatchId(?string $bulkSendBatchId): self
    {
        $this->initialized['bulkSendBatchId'] = true;
        $this->bulkSendBatchId = $bulkSendBatchId;

        return $this;
    }

    public function getDeclineInformation(): ?SignatureRequestDeclineInformation
    {
        return $this->declineInformation;
    }

    public function setDeclineInformation(?SignatureRequestDeclineInformation $declineInformation): self
    {
        $this->initialized['declineInformation'] = true;
        $this->declineInformation = $declineInformation;

        return $this;
    }
}
