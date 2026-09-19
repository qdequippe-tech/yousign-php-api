<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NewSignatureRequestFromScratch implements AdditionalPropertiesInterface
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
     * Name of the signature request.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $name;
    /**
     * Delivery mode to notify Signers.
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * Enable an ordered workflow, each Signer will be requested to sign in a sequential order.
     *
     * @var bool|null
     */
    protected $orderedSigners;
    /**
     * When enabled, Approvers are requested to approve sequentially.
     * Each Approver will be invited to approve only once the previous one has completed their approval.
     *
     * @var bool|null
     */
    protected $orderedApprovers;
    /**
     * When enabled, Approvers and Signers are requested to approve depending of a sequence composed of stages.
     * Every recipients present in a stage will be invited to approve or sign parallelly, and stages are sequential each other.
     * When `custom_recipient_order` is enabled, `ordered_approvers` and `ordered_signers` are ignored.
     *
     * @var bool|null
     */
    protected $customRecipientOrder;
    /**
     * Enable automatic reminders for pending Signers.
     *
     * @var NewSignatureRequestFromScratchReminderSettings|null
     */
    protected $reminderSettings;
    /**
     * Time zone of the dates and times displayed in emails, the Signature Request expiration date, and the PDF Audit Trail. Format: tz database. Default is set to Europe/Paris.
     *
     * @var string|null
     */
    protected $timezone = 'Europe/Paris';
    /**
     * Deprecated; use `email_notification.custom_text` instead.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $emailCustomNote;
    /**
     * Due date of the Signature Request (yyyy-mm-dd). Defaults to 6 months after initiation.
     * The date cannot be in the past and cannot be more than one year after initiation.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * Create a Signature Request from an existing template.
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * Store a custom id that will be added to webhooks & appended to redirect urls.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Deprecated; use `custom_experience_id` instead.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $brandingId;
    /**
     * Use a specific Custom Experience to customize the signature experience. When creating from a template, omit this field to inherit the Custom Experience of the template, or set it to null to apply no Custom Experience.
     *
     * @var string|null
     */
    protected $customExperienceId;
    /**
     * Deprecated; attach Documents via the Documents endpoint instead.
     *
     * @deprecated
     *
     * @var list<string>|null
     */
    protected $documents;
    /**
     * Deprecated; add Signers via the Signers endpoint instead.
     *
     * @deprecated
     *
     * @var list<SignatureRequestSignerFromInfoInput>|list<SignatureRequestSignerFromUserIdInput>|list<SignatureRequestSignerFromContactIdInput>|null
     */
    protected $signers;
    /**
     * Scope the signature request to a specific workspace. If template_id is filled and Template is already linked to a Workspace, keep this field to null ; the created Signature Request will be scoped to Template's Workspace.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Define the locale for the generated audit trail.
     *
     * @var string|null
     */
    protected $auditTrailLocale;
    /**
     * Allowing signers to decline to sign.
     *
     * @var bool|null
     */
    protected $signersAllowedToDecline = false;
    /**
     * Email notification configuration for recipients.
     *
     * @var SignatureRequestEmailNotification|null
     */
    protected $emailNotification;
    /**
     * Embedded Preparation settings for this Signature Request.
     *
     * @var SignatureRequestEmbeddedPreparation|null
     */
    protected $embeddedPreparation;
    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     *
     * @var NewSignatureRequestFromScratchTemplatePlaceholders|null
     */
    protected $templatePlaceholders;
    /**
     * Once the signature request completed, archive its documents in a secure digital safe.
     *
     * @var string|null
     */
    protected $archiving;
    /**
     * List of Labels to associate with the Signature Request. Labels are identified by their ID.
     *
     * @var list<string>|null
     */
    protected $labels;
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
     * Name of the signature request.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the signature request.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Delivery mode to notify Signers.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * Delivery mode to notify Signers.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

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
     * When enabled, Approvers are requested to approve sequentially.
     * Each Approver will be invited to approve only once the previous one has completed their approval.
     */
    public function getOrderedApprovers(): ?bool
    {
        return $this->orderedApprovers;
    }

    /**
     * When enabled, Approvers are requested to approve sequentially.
     * Each Approver will be invited to approve only once the previous one has completed their approval.
     */
    public function setOrderedApprovers(?bool $orderedApprovers): self
    {
        $this->initialized['orderedApprovers'] = true;
        $this->orderedApprovers = $orderedApprovers;

        return $this;
    }

    /**
     * When enabled, Approvers and Signers are requested to approve depending of a sequence composed of stages.
     * Every recipients present in a stage will be invited to approve or sign parallelly, and stages are sequential each other.
     * When `custom_recipient_order` is enabled, `ordered_approvers` and `ordered_signers` are ignored.
     */
    public function getCustomRecipientOrder(): ?bool
    {
        return $this->customRecipientOrder;
    }

    /**
     * When enabled, Approvers and Signers are requested to approve depending of a sequence composed of stages.
     * Every recipients present in a stage will be invited to approve or sign parallelly, and stages are sequential each other.
     * When `custom_recipient_order` is enabled, `ordered_approvers` and `ordered_signers` are ignored.
     */
    public function setCustomRecipientOrder(?bool $customRecipientOrder): self
    {
        $this->initialized['customRecipientOrder'] = true;
        $this->customRecipientOrder = $customRecipientOrder;

        return $this;
    }

    /**
     * Enable automatic reminders for pending Signers.
     */
    public function getReminderSettings(): ?NewSignatureRequestFromScratchReminderSettings
    {
        return $this->reminderSettings;
    }

    /**
     * Enable automatic reminders for pending Signers.
     */
    public function setReminderSettings(?NewSignatureRequestFromScratchReminderSettings $reminderSettings): self
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
     * Deprecated; use `email_notification.custom_text` instead.
     *
     * @deprecated
     */
    public function getEmailCustomNote(): ?string
    {
        return $this->emailCustomNote;
    }

    /**
     * Deprecated; use `email_notification.custom_text` instead.
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
     * Due date of the Signature Request (yyyy-mm-dd). Defaults to 6 months after initiation.
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the Signature Request (yyyy-mm-dd). Defaults to 6 months after initiation.
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Create a Signature Request from an existing template.
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }

    /**
     * Create a Signature Request from an existing template.
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Store a custom id that will be added to webhooks & appended to redirect urls.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Store a custom id that will be added to webhooks & appended to redirect urls.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Deprecated; use `custom_experience_id` instead.
     *
     * @deprecated
     */
    public function getBrandingId(): ?string
    {
        return $this->brandingId;
    }

    /**
     * Deprecated; use `custom_experience_id` instead.
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
     * Use a specific Custom Experience to customize the signature experience. When creating from a template, omit this field to inherit the Custom Experience of the template, or set it to null to apply no Custom Experience.
     */
    public function getCustomExperienceId(): ?string
    {
        return $this->customExperienceId;
    }

    /**
     * Use a specific Custom Experience to customize the signature experience. When creating from a template, omit this field to inherit the Custom Experience of the template, or set it to null to apply no Custom Experience.
     */
    public function setCustomExperienceId(?string $customExperienceId): self
    {
        $this->initialized['customExperienceId'] = true;
        $this->customExperienceId = $customExperienceId;

        return $this;
    }

    /**
     * Deprecated; attach Documents via the Documents endpoint instead.
     *
     * @deprecated
     *
     * @return list<string>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * Deprecated; attach Documents via the Documents endpoint instead.
     *
     * @param list<string>|null $documents
     *
     * @deprecated
     */
    public function setDocuments(?array $documents): self
    {
        $this->initialized['documents'] = true;
        $this->documents = $documents;

        return $this;
    }

    /**
     * Deprecated; add Signers via the Signers endpoint instead.
     *
     * @deprecated
     *
     * @return list<SignatureRequestSignerFromInfoInput>|list<SignatureRequestSignerFromUserIdInput>|list<SignatureRequestSignerFromContactIdInput>|null
     */
    public function getSigners(): ?array
    {
        return $this->signers;
    }

    /**
     * Deprecated; add Signers via the Signers endpoint instead.
     *
     * @param list<SignatureRequestSignerFromInfoInput>|list<SignatureRequestSignerFromUserIdInput>|list<SignatureRequestSignerFromContactIdInput>|null $signers
     *
     * @deprecated
     */
    public function setSigners(?array $signers): self
    {
        $this->initialized['signers'] = true;
        $this->signers = $signers;

        return $this;
    }

    /**
     * Scope the signature request to a specific workspace. If template_id is filled and Template is already linked to a Workspace, keep this field to null ; the created Signature Request will be scoped to Template's Workspace.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Scope the signature request to a specific workspace. If template_id is filled and Template is already linked to a Workspace, keep this field to null ; the created Signature Request will be scoped to Template's Workspace.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Define the locale for the generated audit trail.
     */
    public function getAuditTrailLocale(): ?string
    {
        return $this->auditTrailLocale;
    }

    /**
     * Define the locale for the generated audit trail.
     */
    public function setAuditTrailLocale(?string $auditTrailLocale): self
    {
        $this->initialized['auditTrailLocale'] = true;
        $this->auditTrailLocale = $auditTrailLocale;

        return $this;
    }

    /**
     * Allowing signers to decline to sign.
     */
    public function getSignersAllowedToDecline(): ?bool
    {
        return $this->signersAllowedToDecline;
    }

    /**
     * Allowing signers to decline to sign.
     */
    public function setSignersAllowedToDecline(?bool $signersAllowedToDecline): self
    {
        $this->initialized['signersAllowedToDecline'] = true;
        $this->signersAllowedToDecline = $signersAllowedToDecline;

        return $this;
    }

    /**
     * Email notification configuration for recipients.
     */
    public function getEmailNotification(): ?SignatureRequestEmailNotification
    {
        return $this->emailNotification;
    }

    /**
     * Email notification configuration for recipients.
     */
    public function setEmailNotification(?SignatureRequestEmailNotification $emailNotification): self
    {
        $this->initialized['emailNotification'] = true;
        $this->emailNotification = $emailNotification;

        return $this;
    }

    /**
     * Embedded Preparation settings for this Signature Request.
     */
    public function getEmbeddedPreparation(): ?SignatureRequestEmbeddedPreparation
    {
        return $this->embeddedPreparation;
    }

    /**
     * Embedded Preparation settings for this Signature Request.
     */
    public function setEmbeddedPreparation(?SignatureRequestEmbeddedPreparation $embeddedPreparation): self
    {
        $this->initialized['embeddedPreparation'] = true;
        $this->embeddedPreparation = $embeddedPreparation;

        return $this;
    }

    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     */
    public function getTemplatePlaceholders(): ?NewSignatureRequestFromScratchTemplatePlaceholders
    {
        return $this->templatePlaceholders;
    }

    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     */
    public function setTemplatePlaceholders(?NewSignatureRequestFromScratchTemplatePlaceholders $templatePlaceholders): self
    {
        $this->initialized['templatePlaceholders'] = true;
        $this->templatePlaceholders = $templatePlaceholders;

        return $this;
    }

    /**
     * Once the signature request completed, archive its documents in a secure digital safe.
     */
    public function getArchiving(): ?string
    {
        return $this->archiving;
    }

    /**
     * Once the signature request completed, archive its documents in a secure digital safe.
     */
    public function setArchiving(?string $archiving): self
    {
        $this->initialized['archiving'] = true;
        $this->archiving = $archiving;

        return $this;
    }

    /**
     * List of Labels to associate with the Signature Request. Labels are identified by their ID.
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }

    /**
     * List of Labels to associate with the Signature Request. Labels are identified by their ID.
     *
     * @param list<string>|null $labels
     */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

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

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'deliveryMode' => ['delivery_mode', 'getDeliveryMode', 'setDeliveryMode'], 'orderedSigners' => ['ordered_signers', 'getOrderedSigners', 'setOrderedSigners'], 'orderedApprovers' => ['ordered_approvers', 'getOrderedApprovers', 'setOrderedApprovers'], 'customRecipientOrder' => ['custom_recipient_order', 'getCustomRecipientOrder', 'setCustomRecipientOrder'], 'reminderSettings' => ['reminder_settings', 'getReminderSettings', 'setReminderSettings'], 'timezone' => ['timezone', 'getTimezone', 'setTimezone'], 'emailCustomNote' => ['email_custom_note', 'getEmailCustomNote', 'setEmailCustomNote'], 'expirationDate' => ['expiration_date', 'getExpirationDate', 'setExpirationDate'], 'templateId' => ['template_id', 'getTemplateId', 'setTemplateId'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'brandingId' => ['branding_id', 'getBrandingId', 'setBrandingId'], 'customExperienceId' => ['custom_experience_id', 'getCustomExperienceId', 'setCustomExperienceId'], 'documents' => ['documents', 'getDocuments', 'setDocuments'], 'signers' => ['signers', 'getSigners', 'setSigners'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'auditTrailLocale' => ['audit_trail_locale', 'getAuditTrailLocale', 'setAuditTrailLocale'], 'signersAllowedToDecline' => ['signers_allowed_to_decline', 'getSignersAllowedToDecline', 'setSignersAllowedToDecline'], 'emailNotification' => ['email_notification', 'getEmailNotification', 'setEmailNotification'], 'embeddedPreparation' => ['embedded_preparation', 'getEmbeddedPreparation', 'setEmbeddedPreparation'], 'templatePlaceholders' => ['template_placeholders', 'getTemplatePlaceholders', 'setTemplatePlaceholders'], 'archiving' => ['archiving', 'getArchiving', 'setArchiving'], 'labels' => ['labels', 'getLabels', 'setLabels'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId']];
    }
}
