<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateSignatureRequest implements AdditionalPropertiesInterface
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
     * Name of the Signature Request.
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
     * When enabled, Approvers are requested to approve sequentially.
     * Each Approver will be invited to approve only once the previous one has completed their approval.
     *
     * @var bool|null
     */
    protected $orderedApprovers;
    /**
     * Automatic reminder configuration; set to `null` to disable.
     *
     * @var UpdateSignatureRequestReminderSettings|null
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
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
    /**
     * Custom identifier added to webhooks and appended to redirect URLs.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Deprecated. Identifier of the branding to apply; use `custom_experience_id` instead.
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
     * Allowing signers to decline to sign.
     *
     * @var bool|null
     */
    protected $signersAllowedToDecline = false;
    /**
     * Transfer the Signature Request into a given Workspace.
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
     * List of Labels to associate with the Signature Request. Labels are identified by their ID.
     *
     * @var list<string>|null
     */
    protected $labels;

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
     * Automatic reminder configuration; set to `null` to disable.
     */
    public function getReminderSettings(): ?UpdateSignatureRequestReminderSettings
    {
        return $this->reminderSettings;
    }

    /**
     * Automatic reminder configuration; set to `null` to disable.
     */
    public function setReminderSettings(?UpdateSignatureRequestReminderSettings $reminderSettings): self
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
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Custom identifier added to webhooks and appended to redirect URLs.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Custom identifier added to webhooks and appended to redirect URLs.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Deprecated. Identifier of the branding to apply; use `custom_experience_id` instead.
     *
     * @deprecated
     */
    public function getBrandingId(): ?string
    {
        return $this->brandingId;
    }

    /**
     * Deprecated. Identifier of the branding to apply; use `custom_experience_id` instead.
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
     * Transfer the Signature Request into a given Workspace.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Transfer the Signature Request into a given Workspace.
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

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'deliveryMode' => ['delivery_mode', 'getDeliveryMode', 'setDeliveryMode'], 'orderedSigners' => ['ordered_signers', 'getOrderedSigners', 'setOrderedSigners'], 'orderedApprovers' => ['ordered_approvers', 'getOrderedApprovers', 'setOrderedApprovers'], 'reminderSettings' => ['reminder_settings', 'getReminderSettings', 'setReminderSettings'], 'timezone' => ['timezone', 'getTimezone', 'setTimezone'], 'emailCustomNote' => ['email_custom_note', 'getEmailCustomNote', 'setEmailCustomNote'], 'expirationDate' => ['expiration_date', 'getExpirationDate', 'setExpirationDate'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'brandingId' => ['branding_id', 'getBrandingId', 'setBrandingId'], 'customExperienceId' => ['custom_experience_id', 'getCustomExperienceId', 'setCustomExperienceId'], 'signersAllowedToDecline' => ['signers_allowed_to_decline', 'getSignersAllowedToDecline', 'setSignersAllowedToDecline'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'auditTrailLocale' => ['audit_trail_locale', 'getAuditTrailLocale', 'setAuditTrailLocale'], 'emailNotification' => ['email_notification', 'getEmailNotification', 'setEmailNotification'], 'embeddedPreparation' => ['embedded_preparation', 'getEmbeddedPreparation', 'setEmbeddedPreparation'], 'labels' => ['labels', 'getLabels', 'setLabels']];
    }
}
