<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestInList implements AdditionalPropertiesInterface
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
     * Unique identifier of the Signature Request.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Current status of the Signature Request.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Name of the Signature Request.
     *
     * @var string|null
     */
    protected $name;
    /**
     * How recipients are notified: `email` or `none`.
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * Timestamp when the Signature Request was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Timestamp indicating when the Signature Request was activated and made available to its recipients.\
     * Returns `null` if the Signature Request is still in `draft`.
     *
     * @var \DateTime|null
     */
    protected $activatedAt;
    /**
     * Timestamp indicating when the Signature Request reached the `done` status, i.e. all required Signers have signed and all Approvers have approved.\
     * Returns `null` if the Signature Request is not yet complete.
     *
     * @var \DateTime|null
     */
    protected $completedAt;
    /**
     * Timestamp indicating when all Approvers have approved the Signature Request when custom recipient flow is not enabled.\
     * Returns `null` if no approvers are configured, or if at least one approver has not yet approved, or when `custom_recipient_order` is enabled.
     *
     * @var \DateTime|null
     */
    protected $approvedAt;
    /**
     * Enable an ordered workflow, each Signer will be requested to sign in a sequential order.
     *
     * @var bool|null
     */
    protected $orderedSigners;
    /**
     * Enable an ordered workflow, each Approver will be requested to approve in a sequential order.
     *
     * @var bool|null
     */
    protected $orderedApprovers;
    /**
     * Automatic reminder configuration for pending recipients; `null` if reminders are disabled.
     *
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
     * Deprecated. Custom note added to notification emails.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $emailCustomNote;
    /**
     * Due date of the Signature Request.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * Origin channel through which the Signature Request was created.
     *
     * @var string|null
     */
    protected $source;
    /**
     * List of Signers.
     *
     * @var list<SignatureRequestInListSignersInner>|null
     */
    protected $signers;
    /**
     * List of Approvers.
     *
     * @var list<SignatureRequestInListApproversInner>|null
     */
    protected $approvers;
    /**
     * Labels associated to the Signature Request.
     *
     * @var list<SignatureRequestLabel>|null
     */
    protected $labels;
    /**
     * List of Documents attached to the Signature Request.
     *
     * @var list<SignatureRequestInListDocumentsInner>|null
     */
    protected $documents;
    /**
     * User who sent the Signature Request; `null` while in `draft`.
     *
     * @var SignatureRequestInListSender|null
     */
    protected $sender;
    /**
     * Custom identifier attached to webhooks and appended to redirect URLs.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Deprecated. Identifier of the branding applied.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $brandingId;
    /**
     * Identifier of the Custom Experience applied.
     *
     * @var string|null
     */
    protected $customExperienceId;
    /**
     * Whether Signers are allowed to decline signing.
     *
     * @var bool|null
     */
    protected $signersAllowedToDecline;
    /**
     * Identifier of the Workspace the Signature Request belongs to.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Locale used for the generated audit trail.
     *
     * @var string|null
     */
    protected $auditTrailLocale;
    /**
     * Identifier of the bulk send batch, if created via bulk send.
     *
     * @var string|null
     */
    protected $bulkSendBatchId;
    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     *
     * @var string|null
     */
    protected $workflowSessionId;
    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     *
     * @var string|null
     */
    protected $previousAttemptId;
    /**
     * Enable a custom recipients order.
     *
     * @var bool|null
     */
    protected $customRecipientOrder;
    /**
     * Custom properties associated with the Signature Request.
     *
     * @var list<CustomPropertyInList>|null
     */
    protected $customProperties;

    /**
     * Unique identifier of the Signature Request.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Signature Request.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Current status of the Signature Request.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Current status of the Signature Request.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Name of the Signature Request.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Signature Request.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * How recipients are notified: `email` or `none`.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * How recipients are notified: `email` or `none`.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }

    /**
     * Timestamp when the Signature Request was created.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Timestamp when the Signature Request was created.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Timestamp indicating when the Signature Request was activated and made available to its recipients.\
     * Returns `null` if the Signature Request is still in `draft`.
     */
    public function getActivatedAt(): ?\DateTime
    {
        return $this->activatedAt;
    }

    /**
     * Timestamp indicating when the Signature Request was activated and made available to its recipients.\
     * Returns `null` if the Signature Request is still in `draft`.
     */
    public function setActivatedAt(?\DateTime $activatedAt): self
    {
        $this->initialized['activatedAt'] = true;
        $this->activatedAt = $activatedAt;

        return $this;
    }

    /**
     * Timestamp indicating when the Signature Request reached the `done` status, i.e. all required Signers have signed and all Approvers have approved.\
     * Returns `null` if the Signature Request is not yet complete.
     */
    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }

    /**
     * Timestamp indicating when the Signature Request reached the `done` status, i.e. all required Signers have signed and all Approvers have approved.\
     * Returns `null` if the Signature Request is not yet complete.
     */
    public function setCompletedAt(?\DateTime $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;

        return $this;
    }

    /**
     * Timestamp indicating when all Approvers have approved the Signature Request when custom recipient flow is not enabled.\
     * Returns `null` if no approvers are configured, or if at least one approver has not yet approved, or when `custom_recipient_order` is enabled.
     */
    public function getApprovedAt(): ?\DateTime
    {
        return $this->approvedAt;
    }

    /**
     * Timestamp indicating when all Approvers have approved the Signature Request when custom recipient flow is not enabled.\
     * Returns `null` if no approvers are configured, or if at least one approver has not yet approved, or when `custom_recipient_order` is enabled.
     */
    public function setApprovedAt(?\DateTime $approvedAt): self
    {
        $this->initialized['approvedAt'] = true;
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Enable an ordered workflow, each Signer will be requested to sign in a sequential order.
     */
    public function getOrderedSigners(): ?bool
    {
        return $this->orderedSigners;
    }

    /**
     * Enable an ordered workflow, each Signer will be requested to sign in a sequential order.
     */
    public function setOrderedSigners(?bool $orderedSigners): self
    {
        $this->initialized['orderedSigners'] = true;
        $this->orderedSigners = $orderedSigners;

        return $this;
    }

    /**
     * Enable an ordered workflow, each Approver will be requested to approve in a sequential order.
     */
    public function getOrderedApprovers(): ?bool
    {
        return $this->orderedApprovers;
    }

    /**
     * Enable an ordered workflow, each Approver will be requested to approve in a sequential order.
     */
    public function setOrderedApprovers(?bool $orderedApprovers): self
    {
        $this->initialized['orderedApprovers'] = true;
        $this->orderedApprovers = $orderedApprovers;

        return $this;
    }

    /**
     * Automatic reminder configuration for pending recipients; `null` if reminders are disabled.
     */
    public function getReminderSettings(): ?SignatureRequestInListReminderSettings
    {
        return $this->reminderSettings;
    }

    /**
     * Automatic reminder configuration for pending recipients; `null` if reminders are disabled.
     */
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
     * Deprecated. Custom note added to notification emails.
     *
     * @deprecated
     */
    public function getEmailCustomNote(): ?string
    {
        return $this->emailCustomNote;
    }

    /**
     * Deprecated. Custom note added to notification emails.
     *
     * @deprecated
     */
    public function setEmailCustomNote(?string $emailCustomNote): self
    {
        $this->initialized['emailCustomNote'] = true;
        $this->emailCustomNote = $emailCustomNote;

        return $this;
    }

    /**
     * Due date of the Signature Request.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the Signature Request.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Origin channel through which the Signature Request was created.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Origin channel through which the Signature Request was created.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * List of Signers.
     *
     * @return list<SignatureRequestInListSignersInner>|null
     */
    public function getSigners(): ?array
    {
        return $this->signers;
    }

    /**
     * List of Signers.
     *
     * @param list<SignatureRequestInListSignersInner>|null $signers
     */
    public function setSigners(?array $signers): self
    {
        $this->initialized['signers'] = true;
        $this->signers = $signers;

        return $this;
    }

    /**
     * List of Approvers.
     *
     * @return list<SignatureRequestInListApproversInner>|null
     */
    public function getApprovers(): ?array
    {
        return $this->approvers;
    }

    /**
     * List of Approvers.
     *
     * @param list<SignatureRequestInListApproversInner>|null $approvers
     */
    public function setApprovers(?array $approvers): self
    {
        $this->initialized['approvers'] = true;
        $this->approvers = $approvers;

        return $this;
    }

    /**
     * Labels associated to the Signature Request.
     *
     * @return list<SignatureRequestLabel>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }

    /**
     * Labels associated to the Signature Request.
     *
     * @param list<SignatureRequestLabel>|null $labels
     */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * List of Documents attached to the Signature Request.
     *
     * @return list<SignatureRequestInListDocumentsInner>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * List of Documents attached to the Signature Request.
     *
     * @param list<SignatureRequestInListDocumentsInner>|null $documents
     */
    public function setDocuments(?array $documents): self
    {
        $this->initialized['documents'] = true;
        $this->documents = $documents;

        return $this;
    }

    /**
     * User who sent the Signature Request; `null` while in `draft`.
     */
    public function getSender(): ?SignatureRequestInListSender
    {
        return $this->sender;
    }

    /**
     * User who sent the Signature Request; `null` while in `draft`.
     */
    public function setSender(?SignatureRequestInListSender $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;

        return $this;
    }

    /**
     * Custom identifier attached to webhooks and appended to redirect URLs.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Custom identifier attached to webhooks and appended to redirect URLs.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Deprecated. Identifier of the branding applied.
     *
     * @deprecated
     */
    public function getBrandingId(): ?string
    {
        return $this->brandingId;
    }

    /**
     * Deprecated. Identifier of the branding applied.
     *
     * @deprecated
     */
    public function setBrandingId(?string $brandingId): self
    {
        $this->initialized['brandingId'] = true;
        $this->brandingId = $brandingId;

        return $this;
    }

    /**
     * Identifier of the Custom Experience applied.
     */
    public function getCustomExperienceId(): ?string
    {
        return $this->customExperienceId;
    }

    /**
     * Identifier of the Custom Experience applied.
     */
    public function setCustomExperienceId(?string $customExperienceId): self
    {
        $this->initialized['customExperienceId'] = true;
        $this->customExperienceId = $customExperienceId;

        return $this;
    }

    /**
     * Whether Signers are allowed to decline signing.
     */
    public function getSignersAllowedToDecline(): ?bool
    {
        return $this->signersAllowedToDecline;
    }

    /**
     * Whether Signers are allowed to decline signing.
     */
    public function setSignersAllowedToDecline(?bool $signersAllowedToDecline): self
    {
        $this->initialized['signersAllowedToDecline'] = true;
        $this->signersAllowedToDecline = $signersAllowedToDecline;

        return $this;
    }

    /**
     * Identifier of the Workspace the Signature Request belongs to.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Identifier of the Workspace the Signature Request belongs to.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Locale used for the generated audit trail.
     */
    public function getAuditTrailLocale(): ?string
    {
        return $this->auditTrailLocale;
    }

    /**
     * Locale used for the generated audit trail.
     */
    public function setAuditTrailLocale(?string $auditTrailLocale): self
    {
        $this->initialized['auditTrailLocale'] = true;
        $this->auditTrailLocale = $auditTrailLocale;

        return $this;
    }

    /**
     * Identifier of the bulk send batch, if created via bulk send.
     */
    public function getBulkSendBatchId(): ?string
    {
        return $this->bulkSendBatchId;
    }

    /**
     * Identifier of the bulk send batch, if created via bulk send.
     */
    public function setBulkSendBatchId(?string $bulkSendBatchId): self
    {
        $this->initialized['bulkSendBatchId'] = true;
        $this->bulkSendBatchId = $bulkSendBatchId;

        return $this;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function getWorkflowSessionId(): ?string
    {
        return $this->workflowSessionId;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function setWorkflowSessionId(?string $workflowSessionId): self
    {
        $this->initialized['workflowSessionId'] = true;
        $this->workflowSessionId = $workflowSessionId;

        return $this;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function getPreviousAttemptId(): ?string
    {
        return $this->previousAttemptId;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function setPreviousAttemptId(?string $previousAttemptId): self
    {
        $this->initialized['previousAttemptId'] = true;
        $this->previousAttemptId = $previousAttemptId;

        return $this;
    }

    /**
     * Enable a custom recipients order.
     */
    public function getCustomRecipientOrder(): ?bool
    {
        return $this->customRecipientOrder;
    }

    /**
     * Enable a custom recipients order.
     */
    public function setCustomRecipientOrder(?bool $customRecipientOrder): self
    {
        $this->initialized['customRecipientOrder'] = true;
        $this->customRecipientOrder = $customRecipientOrder;

        return $this;
    }

    /**
     * Custom properties associated with the Signature Request.
     *
     * @return list<CustomPropertyInList>|null
     */
    public function getCustomProperties(): ?array
    {
        return $this->customProperties;
    }

    /**
     * Custom properties associated with the Signature Request.
     *
     * @param list<CustomPropertyInList>|null $customProperties
     */
    public function setCustomProperties(?array $customProperties): self
    {
        $this->initialized['customProperties'] = true;
        $this->customProperties = $customProperties;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'status' => ['status', 'getStatus', 'setStatus'], 'name' => ['name', 'getName', 'setName'], 'deliveryMode' => ['delivery_mode', 'getDeliveryMode', 'setDeliveryMode'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'activatedAt' => ['activated_at', 'getActivatedAt', 'setActivatedAt'], 'completedAt' => ['completed_at', 'getCompletedAt', 'setCompletedAt'], 'approvedAt' => ['approved_at', 'getApprovedAt', 'setApprovedAt'], 'orderedSigners' => ['ordered_signers', 'getOrderedSigners', 'setOrderedSigners'], 'orderedApprovers' => ['ordered_approvers', 'getOrderedApprovers', 'setOrderedApprovers'], 'reminderSettings' => ['reminder_settings', 'getReminderSettings', 'setReminderSettings'], 'timezone' => ['timezone', 'getTimezone', 'setTimezone'], 'emailCustomNote' => ['email_custom_note', 'getEmailCustomNote', 'setEmailCustomNote'], 'expirationDate' => ['expiration_date', 'getExpirationDate', 'setExpirationDate'], 'source' => ['source', 'getSource', 'setSource'], 'signers' => ['signers', 'getSigners', 'setSigners'], 'approvers' => ['approvers', 'getApprovers', 'setApprovers'], 'labels' => ['labels', 'getLabels', 'setLabels'], 'documents' => ['documents', 'getDocuments', 'setDocuments'], 'sender' => ['sender', 'getSender', 'setSender'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'brandingId' => ['branding_id', 'getBrandingId', 'setBrandingId'], 'customExperienceId' => ['custom_experience_id', 'getCustomExperienceId', 'setCustomExperienceId'], 'signersAllowedToDecline' => ['signers_allowed_to_decline', 'getSignersAllowedToDecline', 'setSignersAllowedToDecline'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'auditTrailLocale' => ['audit_trail_locale', 'getAuditTrailLocale', 'setAuditTrailLocale'], 'bulkSendBatchId' => ['bulk_send_batch_id', 'getBulkSendBatchId', 'setBulkSendBatchId'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId'], 'customRecipientOrder' => ['custom_recipient_order', 'getCustomRecipientOrder', 'setCustomRecipientOrder'], 'customProperties' => ['custom_properties', 'getCustomProperties', 'setCustomProperties']];
    }
}
