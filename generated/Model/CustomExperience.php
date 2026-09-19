<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomExperience implements AdditionalPropertiesInterface
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
    protected $name;
    /**
     * @var bool|null
     */
    protected $landingPageDisabled;
    /**
     * @var bool|null
     */
    protected $sidePanelDisabled;
    /**
     * @var string|null
     */
    protected $backgroundColor;
    /**
     * @var string|null
     */
    protected $buttonColor;
    /**
     * @var string|null
     */
    protected $textColor;
    /**
     * @var string|null
     */
    protected $textButtonColor;
    /**
     * @var list<string>|null
     */
    protected $disabledNotifications;
    /**
     * @var bool|null
     */
    protected $emailLogoDisabled;
    /**
     * @var bool|null
     */
    protected $emailHeaderTextDisabled;
    /**
     * @var bool|null
     */
    protected $emailFooterSignatureDisabled;
    /**
     * @var bool|null
     */
    protected $emailExpirationTextDisabled;
    /**
     * @var bool|null
     */
    protected $recipientsActivityDisabled;
    /**
     * @var bool|null
     */
    protected $downloadDocumentsDisabled;
    /**
     * @var bool|null
     */
    protected $documentNavigationDisabled;
    /**
     * @var CustomExperienceRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * Navigation bar of the Embedded Preparation page, or null when it is not displayed at all.
     *
     * @var CustomExperienceEmbeddedPreparationNavigationBar|null
     */
    protected $embeddedPreparationNavigationBar;
    /**
     * @var string|null
     */
    protected $logo;
    /**
     * Custom Experience Source.
     *
     * @var string|null
     */
    protected $source;
    /**
     * The Workspace the Custom Experience is scoped to, or null if it is Organization-wide.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;

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

    public function getLandingPageDisabled(): ?bool
    {
        return $this->landingPageDisabled;
    }

    public function setLandingPageDisabled(?bool $landingPageDisabled): self
    {
        $this->initialized['landingPageDisabled'] = true;
        $this->landingPageDisabled = $landingPageDisabled;

        return $this;
    }

    public function getSidePanelDisabled(): ?bool
    {
        return $this->sidePanelDisabled;
    }

    public function setSidePanelDisabled(?bool $sidePanelDisabled): self
    {
        $this->initialized['sidePanelDisabled'] = true;
        $this->sidePanelDisabled = $sidePanelDisabled;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(?string $backgroundColor): self
    {
        $this->initialized['backgroundColor'] = true;
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getButtonColor(): ?string
    {
        return $this->buttonColor;
    }

    public function setButtonColor(?string $buttonColor): self
    {
        $this->initialized['buttonColor'] = true;
        $this->buttonColor = $buttonColor;

        return $this;
    }

    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    public function setTextColor(?string $textColor): self
    {
        $this->initialized['textColor'] = true;
        $this->textColor = $textColor;

        return $this;
    }

    public function getTextButtonColor(): ?string
    {
        return $this->textButtonColor;
    }

    public function setTextButtonColor(?string $textButtonColor): self
    {
        $this->initialized['textButtonColor'] = true;
        $this->textButtonColor = $textButtonColor;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getDisabledNotifications(): ?array
    {
        return $this->disabledNotifications;
    }

    /**
     * @param list<string>|null $disabledNotifications
     */
    public function setDisabledNotifications(?array $disabledNotifications): self
    {
        $this->initialized['disabledNotifications'] = true;
        $this->disabledNotifications = $disabledNotifications;

        return $this;
    }

    public function getEmailLogoDisabled(): ?bool
    {
        return $this->emailLogoDisabled;
    }

    public function setEmailLogoDisabled(?bool $emailLogoDisabled): self
    {
        $this->initialized['emailLogoDisabled'] = true;
        $this->emailLogoDisabled = $emailLogoDisabled;

        return $this;
    }

    public function getEmailHeaderTextDisabled(): ?bool
    {
        return $this->emailHeaderTextDisabled;
    }

    public function setEmailHeaderTextDisabled(?bool $emailHeaderTextDisabled): self
    {
        $this->initialized['emailHeaderTextDisabled'] = true;
        $this->emailHeaderTextDisabled = $emailHeaderTextDisabled;

        return $this;
    }

    public function getEmailFooterSignatureDisabled(): ?bool
    {
        return $this->emailFooterSignatureDisabled;
    }

    public function setEmailFooterSignatureDisabled(?bool $emailFooterSignatureDisabled): self
    {
        $this->initialized['emailFooterSignatureDisabled'] = true;
        $this->emailFooterSignatureDisabled = $emailFooterSignatureDisabled;

        return $this;
    }

    public function getEmailExpirationTextDisabled(): ?bool
    {
        return $this->emailExpirationTextDisabled;
    }

    public function setEmailExpirationTextDisabled(?bool $emailExpirationTextDisabled): self
    {
        $this->initialized['emailExpirationTextDisabled'] = true;
        $this->emailExpirationTextDisabled = $emailExpirationTextDisabled;

        return $this;
    }

    public function getRecipientsActivityDisabled(): ?bool
    {
        return $this->recipientsActivityDisabled;
    }

    public function setRecipientsActivityDisabled(?bool $recipientsActivityDisabled): self
    {
        $this->initialized['recipientsActivityDisabled'] = true;
        $this->recipientsActivityDisabled = $recipientsActivityDisabled;

        return $this;
    }

    public function getDownloadDocumentsDisabled(): ?bool
    {
        return $this->downloadDocumentsDisabled;
    }

    public function setDownloadDocumentsDisabled(?bool $downloadDocumentsDisabled): self
    {
        $this->initialized['downloadDocumentsDisabled'] = true;
        $this->downloadDocumentsDisabled = $downloadDocumentsDisabled;

        return $this;
    }

    public function getDocumentNavigationDisabled(): ?bool
    {
        return $this->documentNavigationDisabled;
    }

    public function setDocumentNavigationDisabled(?bool $documentNavigationDisabled): self
    {
        $this->initialized['documentNavigationDisabled'] = true;
        $this->documentNavigationDisabled = $documentNavigationDisabled;

        return $this;
    }

    public function getRedirectUrls(): ?CustomExperienceRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?CustomExperienceRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    /**
     * Navigation bar of the Embedded Preparation page, or null when it is not displayed at all.
     */
    public function getEmbeddedPreparationNavigationBar(): ?CustomExperienceEmbeddedPreparationNavigationBar
    {
        return $this->embeddedPreparationNavigationBar;
    }

    /**
     * Navigation bar of the Embedded Preparation page, or null when it is not displayed at all.
     */
    public function setEmbeddedPreparationNavigationBar(?CustomExperienceEmbeddedPreparationNavigationBar $embeddedPreparationNavigationBar): self
    {
        $this->initialized['embeddedPreparationNavigationBar'] = true;
        $this->embeddedPreparationNavigationBar = $embeddedPreparationNavigationBar;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->initialized['logo'] = true;
        $this->logo = $logo;

        return $this;
    }

    /**
     * Custom Experience Source.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Custom Experience Source.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * The Workspace the Custom Experience is scoped to, or null if it is Organization-wide.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * The Workspace the Custom Experience is scoped to, or null if it is Organization-wide.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

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

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'name' => ['name', 'getName', 'setName'], 'landingPageDisabled' => ['landing_page_disabled', 'getLandingPageDisabled', 'setLandingPageDisabled'], 'sidePanelDisabled' => ['side_panel_disabled', 'getSidePanelDisabled', 'setSidePanelDisabled'], 'backgroundColor' => ['background_color', 'getBackgroundColor', 'setBackgroundColor'], 'buttonColor' => ['button_color', 'getButtonColor', 'setButtonColor'], 'textColor' => ['text_color', 'getTextColor', 'setTextColor'], 'textButtonColor' => ['text_button_color', 'getTextButtonColor', 'setTextButtonColor'], 'disabledNotifications' => ['disabled_notifications', 'getDisabledNotifications', 'setDisabledNotifications'], 'emailLogoDisabled' => ['email_logo_disabled', 'getEmailLogoDisabled', 'setEmailLogoDisabled'], 'emailHeaderTextDisabled' => ['email_header_text_disabled', 'getEmailHeaderTextDisabled', 'setEmailHeaderTextDisabled'], 'emailFooterSignatureDisabled' => ['email_footer_signature_disabled', 'getEmailFooterSignatureDisabled', 'setEmailFooterSignatureDisabled'], 'emailExpirationTextDisabled' => ['email_expiration_text_disabled', 'getEmailExpirationTextDisabled', 'setEmailExpirationTextDisabled'], 'recipientsActivityDisabled' => ['recipients_activity_disabled', 'getRecipientsActivityDisabled', 'setRecipientsActivityDisabled'], 'downloadDocumentsDisabled' => ['download_documents_disabled', 'getDownloadDocumentsDisabled', 'setDownloadDocumentsDisabled'], 'documentNavigationDisabled' => ['document_navigation_disabled', 'getDocumentNavigationDisabled', 'setDocumentNavigationDisabled'], 'redirectUrls' => ['redirect_urls', 'getRedirectUrls', 'setRedirectUrls'], 'embeddedPreparationNavigationBar' => ['embedded_preparation_navigation_bar', 'getEmbeddedPreparationNavigationBar', 'setEmbeddedPreparationNavigationBar'], 'logo' => ['logo', 'getLogo', 'setLogo'], 'source' => ['source', 'getSource', 'setSource'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt']];
    }
}
