<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class OrganizationOutput
{
    /**
     * Organization ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Organization name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Custom URL for the Organization (internal usage only, should not be used).
     *
     * @var string|null
     */
    protected $url;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fSso;
    /**
     * Internal usage, should not be used.
     *
     * @var float|null
     */
    protected $maxUsers;
    /**
     * Defined if the organization anable the related files.
     *
     * @var bool|null
     */
    protected $procedureRelatedFilesEnable;
    /**
     * @var string[]|null
     */
    protected $subscriptions;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $autoCollection;
    /**
     * Internal usage, should not be used.
     *
     * @var string|null
     */
    protected $vatNumber;
    /**
     * @var OrganizationBillingAddress|null
     */
    protected $billingAddress;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $inAppSupport;
    /**
     * Internal usage, should not be used.
     *
     * @var string|null
     */
    protected $inAppUpdates;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fileTemplate;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fArchive;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fUserPermissions;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fProcedureTemplate;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fProcedureReminderAuto;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fApi;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fCheckdocument;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fProcedureCreate;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fSignatureUi;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fServerStamp;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fOperationLevelNone;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fConsentProcess;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fOperationLevelAdvanced;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fOperationCustomModeEmail;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fDynamicFields;
    /**
     * Internal usage, should not be used.
     *
     * @var string|null
     */
    protected $samlIdentityProvider;
    /**
     * Pattern of the password policy for the organization.
     *
     * @var string|null
     */
    protected $passwordPolicyPattern;
    /**
     * Description for the password policy.
     *
     * @var string|null
     */
    protected $passwordPolicyDescription;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $userActivation;
    /**
     * Internal usage, should not be used.
     *
     * @var bool|null
     */
    protected $fProcedureTemplatePermissions;

    /**
     * Organization ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Organization ID.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Organization name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Organization name.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Custom URL for the Organization (internal usage only, should not be used).
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Custom URL for the Organization (internal usage only, should not be used).
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFSso(): ?bool
    {
        return $this->fSso;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFSso(?bool $fSso): self
    {
        $this->fSso = $fSso;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getMaxUsers(): ?float
    {
        return $this->maxUsers;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setMaxUsers(?float $maxUsers): self
    {
        $this->maxUsers = $maxUsers;

        return $this;
    }

    /**
     * Defined if the organization anable the related files.
     */
    public function getProcedureRelatedFilesEnable(): ?bool
    {
        return $this->procedureRelatedFilesEnable;
    }

    /**
     * Defined if the organization anable the related files.
     */
    public function setProcedureRelatedFilesEnable(?bool $procedureRelatedFilesEnable): self
    {
        $this->procedureRelatedFilesEnable = $procedureRelatedFilesEnable;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getSubscriptions(): ?array
    {
        return $this->subscriptions;
    }

    /**
     * @param string[]|null $subscriptions
     */
    public function setSubscriptions(?array $subscriptions): self
    {
        $this->subscriptions = $subscriptions;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getAutoCollection(): ?bool
    {
        return $this->autoCollection;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setAutoCollection(?bool $autoCollection): self
    {
        $this->autoCollection = $autoCollection;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setVatNumber(?string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    public function getBillingAddress(): ?OrganizationBillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?OrganizationBillingAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getInAppSupport(): ?bool
    {
        return $this->inAppSupport;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setInAppSupport(?bool $inAppSupport): self
    {
        $this->inAppSupport = $inAppSupport;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getInAppUpdates(): ?string
    {
        return $this->inAppUpdates;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setInAppUpdates(?string $inAppUpdates): self
    {
        $this->inAppUpdates = $inAppUpdates;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFileTemplate(): ?bool
    {
        return $this->fileTemplate;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFileTemplate(?bool $fileTemplate): self
    {
        $this->fileTemplate = $fileTemplate;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFArchive(): ?bool
    {
        return $this->fArchive;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFArchive(?bool $fArchive): self
    {
        $this->fArchive = $fArchive;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFUserPermissions(): ?bool
    {
        return $this->fUserPermissions;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFUserPermissions(?bool $fUserPermissions): self
    {
        $this->fUserPermissions = $fUserPermissions;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFProcedureTemplate(): ?bool
    {
        return $this->fProcedureTemplate;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFProcedureTemplate(?bool $fProcedureTemplate): self
    {
        $this->fProcedureTemplate = $fProcedureTemplate;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFProcedureReminderAuto(): ?bool
    {
        return $this->fProcedureReminderAuto;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFProcedureReminderAuto(?bool $fProcedureReminderAuto): self
    {
        $this->fProcedureReminderAuto = $fProcedureReminderAuto;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFApi(): ?bool
    {
        return $this->fApi;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFApi(?bool $fApi): self
    {
        $this->fApi = $fApi;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFCheckdocument(): ?bool
    {
        return $this->fCheckdocument;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFCheckdocument(?bool $fCheckdocument): self
    {
        $this->fCheckdocument = $fCheckdocument;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFProcedureCreate(): ?bool
    {
        return $this->fProcedureCreate;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFProcedureCreate(?bool $fProcedureCreate): self
    {
        $this->fProcedureCreate = $fProcedureCreate;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFSignatureUi(): ?bool
    {
        return $this->fSignatureUi;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFSignatureUi(?bool $fSignatureUi): self
    {
        $this->fSignatureUi = $fSignatureUi;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFServerStamp(): ?bool
    {
        return $this->fServerStamp;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFServerStamp(?bool $fServerStamp): self
    {
        $this->fServerStamp = $fServerStamp;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFOperationLevelNone(): ?bool
    {
        return $this->fOperationLevelNone;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFOperationLevelNone(?bool $fOperationLevelNone): self
    {
        $this->fOperationLevelNone = $fOperationLevelNone;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFConsentProcess(): ?bool
    {
        return $this->fConsentProcess;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFConsentProcess(?bool $fConsentProcess): self
    {
        $this->fConsentProcess = $fConsentProcess;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFOperationLevelAdvanced(): ?bool
    {
        return $this->fOperationLevelAdvanced;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFOperationLevelAdvanced(?bool $fOperationLevelAdvanced): self
    {
        $this->fOperationLevelAdvanced = $fOperationLevelAdvanced;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFOperationCustomModeEmail(): ?bool
    {
        return $this->fOperationCustomModeEmail;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFOperationCustomModeEmail(?bool $fOperationCustomModeEmail): self
    {
        $this->fOperationCustomModeEmail = $fOperationCustomModeEmail;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFDynamicFields(): ?bool
    {
        return $this->fDynamicFields;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFDynamicFields(?bool $fDynamicFields): self
    {
        $this->fDynamicFields = $fDynamicFields;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getSamlIdentityProvider(): ?string
    {
        return $this->samlIdentityProvider;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setSamlIdentityProvider(?string $samlIdentityProvider): self
    {
        $this->samlIdentityProvider = $samlIdentityProvider;

        return $this;
    }

    /**
     * Pattern of the password policy for the organization.
     */
    public function getPasswordPolicyPattern(): ?string
    {
        return $this->passwordPolicyPattern;
    }

    /**
     * Pattern of the password policy for the organization.
     */
    public function setPasswordPolicyPattern(?string $passwordPolicyPattern): self
    {
        $this->passwordPolicyPattern = $passwordPolicyPattern;

        return $this;
    }

    /**
     * Description for the password policy.
     */
    public function getPasswordPolicyDescription(): ?string
    {
        return $this->passwordPolicyDescription;
    }

    /**
     * Description for the password policy.
     */
    public function setPasswordPolicyDescription(?string $passwordPolicyDescription): self
    {
        $this->passwordPolicyDescription = $passwordPolicyDescription;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getUserActivation(): ?bool
    {
        return $this->userActivation;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setUserActivation(?bool $userActivation): self
    {
        $this->userActivation = $userActivation;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getFProcedureTemplatePermissions(): ?bool
    {
        return $this->fProcedureTemplatePermissions;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setFProcedureTemplatePermissions(?bool $fProcedureTemplatePermissions): self
    {
        $this->fProcedureTemplatePermissions = $fProcedureTemplatePermissions;

        return $this;
    }
}
