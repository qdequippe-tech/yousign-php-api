<?php

namespace Qdequippe\Yousign\Api\Model;

class CustomExperience extends \ArrayObject
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
     * @var CustomExperienceRedirectUrls|null
     */
    protected $redirectUrls;
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
}
