<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateCustomExperience implements AdditionalPropertiesInterface
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
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var bool|null
     */
    protected $landingPageDisabled = false;
    /**
     * @var bool|null
     */
    protected $sidePanelDisabled = false;
    /**
     * Hexadecimal color value.
     *
     * @var string|null
     */
    protected $backgroundColor;
    /**
     * Hexadecimal color value.
     *
     * @var string|null
     */
    protected $buttonColor;
    /**
     * Hexadecimal color value.
     *
     * @var string|null
     */
    protected $textColor;
    /**
     * Hexadecimal color value.
     *
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
    protected $emailLogoDisabled = false;
    /**
     * @var bool|null
     */
    protected $emailHeaderTextDisabled = false;
    /**
     * @var bool|null
     */
    protected $emailFooterSignatureDisabled = false;
    /**
     * @var bool|null
     */
    protected $emailExpirationTextDisabled = false;
    /**
     * @var bool|null
     */
    protected $recipientsActivityDisabled = true;
    /**
     * If true, signers won't be able to download documents before signing.
     *
     * @var bool|null
     */
    protected $downloadDocumentsDisabled = false;
    /**
     * If true and the request contains more than 1 document, signers must read each document before moving to the next.
     *
     * @var bool|null
     */
    protected $documentNavigationDisabled = false;
    /**
     * @var CreateCustomExperienceRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var CreateCustomExperienceEmbeddedPreparationNavigationBar|null
     */
    protected $embeddedPreparationNavigationBar;
    /**
     * Determines the display layout of the logo. Possible values are:
     * - `round`: Displays the logo in a circular format.
     * - `original`: Displays the logo in its original shape.
     *
     * @var string|null
     */
    protected $logoLayout;
    /**
     * If set, scopes the Custom Experience to a single Workspace. If null (default), the Custom Experience is Organization-wide.
     *
     * @var string|null
     */
    protected $workspaceId;

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
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

    /**
     * Hexadecimal color value.
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    /**
     * Hexadecimal color value.
     */
    public function setBackgroundColor(?string $backgroundColor): self
    {
        $this->initialized['backgroundColor'] = true;
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Hexadecimal color value.
     */
    public function getButtonColor(): ?string
    {
        return $this->buttonColor;
    }

    /**
     * Hexadecimal color value.
     */
    public function setButtonColor(?string $buttonColor): self
    {
        $this->initialized['buttonColor'] = true;
        $this->buttonColor = $buttonColor;

        return $this;
    }

    /**
     * Hexadecimal color value.
     */
    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    /**
     * Hexadecimal color value.
     */
    public function setTextColor(?string $textColor): self
    {
        $this->initialized['textColor'] = true;
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Hexadecimal color value.
     */
    public function getTextButtonColor(): ?string
    {
        return $this->textButtonColor;
    }

    /**
     * Hexadecimal color value.
     */
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

    /**
     * If true, signers won't be able to download documents before signing.
     */
    public function getDownloadDocumentsDisabled(): ?bool
    {
        return $this->downloadDocumentsDisabled;
    }

    /**
     * If true, signers won't be able to download documents before signing.
     */
    public function setDownloadDocumentsDisabled(?bool $downloadDocumentsDisabled): self
    {
        $this->initialized['downloadDocumentsDisabled'] = true;
        $this->downloadDocumentsDisabled = $downloadDocumentsDisabled;

        return $this;
    }

    /**
     * If true and the request contains more than 1 document, signers must read each document before moving to the next.
     */
    public function getDocumentNavigationDisabled(): ?bool
    {
        return $this->documentNavigationDisabled;
    }

    /**
     * If true and the request contains more than 1 document, signers must read each document before moving to the next.
     */
    public function setDocumentNavigationDisabled(?bool $documentNavigationDisabled): self
    {
        $this->initialized['documentNavigationDisabled'] = true;
        $this->documentNavigationDisabled = $documentNavigationDisabled;

        return $this;
    }

    public function getRedirectUrls(): ?CreateCustomExperienceRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?CreateCustomExperienceRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getEmbeddedPreparationNavigationBar(): ?CreateCustomExperienceEmbeddedPreparationNavigationBar
    {
        return $this->embeddedPreparationNavigationBar;
    }

    public function setEmbeddedPreparationNavigationBar(?CreateCustomExperienceEmbeddedPreparationNavigationBar $embeddedPreparationNavigationBar): self
    {
        $this->initialized['embeddedPreparationNavigationBar'] = true;
        $this->embeddedPreparationNavigationBar = $embeddedPreparationNavigationBar;

        return $this;
    }

    /**
     * Determines the display layout of the logo. Possible values are:
     * - `round`: Displays the logo in a circular format.
     * - `original`: Displays the logo in its original shape.
     */
    public function getLogoLayout(): ?string
    {
        return $this->logoLayout;
    }

    /**
     * Determines the display layout of the logo. Possible values are:
     * - `round`: Displays the logo in a circular format.
     * - `original`: Displays the logo in its original shape.
     */
    public function setLogoLayout(?string $logoLayout): self
    {
        $this->initialized['logoLayout'] = true;
        $this->logoLayout = $logoLayout;

        return $this;
    }

    /**
     * If set, scopes the Custom Experience to a single Workspace. If null (default), the Custom Experience is Organization-wide.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * If set, scopes the Custom Experience to a single Workspace. If null (default), the Custom Experience is Organization-wide.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'landingPageDisabled' => ['landing_page_disabled', 'getLandingPageDisabled', 'setLandingPageDisabled'], 'sidePanelDisabled' => ['side_panel_disabled', 'getSidePanelDisabled', 'setSidePanelDisabled'], 'backgroundColor' => ['background_color', 'getBackgroundColor', 'setBackgroundColor'], 'buttonColor' => ['button_color', 'getButtonColor', 'setButtonColor'], 'textColor' => ['text_color', 'getTextColor', 'setTextColor'], 'textButtonColor' => ['text_button_color', 'getTextButtonColor', 'setTextButtonColor'], 'disabledNotifications' => ['disabled_notifications', 'getDisabledNotifications', 'setDisabledNotifications'], 'emailLogoDisabled' => ['email_logo_disabled', 'getEmailLogoDisabled', 'setEmailLogoDisabled'], 'emailHeaderTextDisabled' => ['email_header_text_disabled', 'getEmailHeaderTextDisabled', 'setEmailHeaderTextDisabled'], 'emailFooterSignatureDisabled' => ['email_footer_signature_disabled', 'getEmailFooterSignatureDisabled', 'setEmailFooterSignatureDisabled'], 'emailExpirationTextDisabled' => ['email_expiration_text_disabled', 'getEmailExpirationTextDisabled', 'setEmailExpirationTextDisabled'], 'recipientsActivityDisabled' => ['recipients_activity_disabled', 'getRecipientsActivityDisabled', 'setRecipientsActivityDisabled'], 'downloadDocumentsDisabled' => ['download_documents_disabled', 'getDownloadDocumentsDisabled', 'setDownloadDocumentsDisabled'], 'documentNavigationDisabled' => ['document_navigation_disabled', 'getDocumentNavigationDisabled', 'setDocumentNavigationDisabled'], 'redirectUrls' => ['redirect_urls', 'getRedirectUrls', 'setRedirectUrls'], 'embeddedPreparationNavigationBar' => ['embedded_preparation_navigation_bar', 'getEmbeddedPreparationNavigationBar', 'setEmbeddedPreparationNavigationBar'], 'logoLayout' => ['logo_layout', 'getLogoLayout', 'setLogoLayout'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId']];
    }
}
