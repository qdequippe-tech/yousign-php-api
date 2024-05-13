<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignatureRequest extends \ArrayObject
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
     * Name of the signature request.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Delivery mode to notify signers.
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * Enable an ordered workflow, each signer will be requested to sign in a sequential order.
     *
     * @var bool|null
     */
    protected $orderedSigners;
    /**
     * Enable automatic reminders for pending signers.
     *
     * @var CreateSignatureRequestReminderSettings|null
     */
    protected $reminderSettings;
    /**
     * tz database format.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * A custom note added to emails sent to signers.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $emailCustomNote;
    /**
     * Due date of the signature request (yyyy-mm-dd). Default to 6 month after the activation.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * Create a signature request from an existing template.
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
     * Use a specific branding to customize the signature experience.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $brandingId;
    /**
     * Use a specific Custom Experience to customize the signature experience.
     *
     * @var string|null
     */
    protected $customExperienceId;
    /**
     * You can directly attach orphan documents to the signature request.
     *
     * @deprecated
     *
     * @var list<string>|null
     */
    protected $documents;
    /**
     * Can only be used if you add documents at the same time.
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
     * @var SignatureRequestEmailNotification|null
     */
    protected $emailNotification;
    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     *
     * @var CreateSignatureRequestTemplatePlaceholders|null
     */
    protected $templatePlaceholders;

    /**
     * Name of the signature request.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the signature request.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Delivery mode to notify signers.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * Delivery mode to notify signers.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

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

    /**
     * Enable automatic reminders for pending signers.
     */
    public function getReminderSettings(): ?CreateSignatureRequestReminderSettings
    {
        return $this->reminderSettings;
    }

    /**
     * Enable automatic reminders for pending signers.
     */
    public function setReminderSettings(?CreateSignatureRequestReminderSettings $reminderSettings): self
    {
        $this->initialized['reminderSettings'] = true;
        $this->reminderSettings = $reminderSettings;

        return $this;
    }

    /**
     * tz database format.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * tz database format.
     */
    public function setTimezone(?string $timezone): self
    {
        $this->initialized['timezone'] = true;
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * A custom note added to emails sent to signers.
     *
     * @deprecated
     */
    public function getEmailCustomNote(): ?string
    {
        return $this->emailCustomNote;
    }

    /**
     * A custom note added to emails sent to signers.
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
     * Due date of the signature request (yyyy-mm-dd). Default to 6 month after the activation.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the signature request (yyyy-mm-dd). Default to 6 month after the activation.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Create a signature request from an existing template.
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }

    /**
     * Create a signature request from an existing template.
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
     * Use a specific branding to customize the signature experience.
     *
     * @deprecated
     */
    public function getBrandingId(): ?string
    {
        return $this->brandingId;
    }

    /**
     * Use a specific branding to customize the signature experience.
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
     * Use a specific Custom Experience to customize the signature experience.
     */
    public function getCustomExperienceId(): ?string
    {
        return $this->customExperienceId;
    }

    /**
     * Use a specific Custom Experience to customize the signature experience.
     */
    public function setCustomExperienceId(?string $customExperienceId): self
    {
        $this->initialized['customExperienceId'] = true;
        $this->customExperienceId = $customExperienceId;

        return $this;
    }

    /**
     * You can directly attach orphan documents to the signature request.
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
     * You can directly attach orphan documents to the signature request.
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
     * Can only be used if you add documents at the same time.
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
     * Can only be used if you add documents at the same time.
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

    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     */
    public function getTemplatePlaceholders(): ?CreateSignatureRequestTemplatePlaceholders
    {
        return $this->templatePlaceholders;
    }

    /**
     * When creating a signature request from a template, all substituting data for placeholders defined in the given template.
     */
    public function setTemplatePlaceholders(?CreateSignatureRequestTemplatePlaceholders $templatePlaceholders): self
    {
        $this->initialized['templatePlaceholders'] = true;
        $this->templatePlaceholders = $templatePlaceholders;

        return $this;
    }
}
