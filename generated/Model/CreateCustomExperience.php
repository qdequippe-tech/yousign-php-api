<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateCustomExperience extends \ArrayObject
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
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
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
     * @var CreateCustomExperienceRedirectUrls|null
     */
    protected $redirectUrls;

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
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
}
