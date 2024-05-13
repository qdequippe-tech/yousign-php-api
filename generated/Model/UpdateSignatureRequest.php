<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateSignatureRequest extends \ArrayObject
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
     * @var UpdateSignatureRequestReminderSettings|null
     */
    protected $reminderSettings;
    /**
     * tz database format.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * @deprecated
     *
     * @var string|null
     */
    protected $emailCustomNote;
    /**
     * Due date of the signature request (yyyy-mm-dd).
     *
     * @var \DateTime|null
     */
    protected $expirationDate;
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
     * @var SignatureRequestEmailNotification|null
     */
    protected $emailNotification;

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

    public function getReminderSettings(): ?UpdateSignatureRequestReminderSettings
    {
        return $this->reminderSettings;
    }

    public function setReminderSettings(?UpdateSignatureRequestReminderSettings $reminderSettings): self
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

    /**
     * Due date of the signature request (yyyy-mm-dd).
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the signature request (yyyy-mm-dd).
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

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
}
