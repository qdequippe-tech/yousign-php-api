<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestPlaceholderSignerSubstituteFromInfoInput extends \ArrayObject
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
    protected $label;
    /**
     * Create new signer.
     *
     * @var SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo|null
     */
    protected $info;
    /**
     * @var string|null
     */
    protected $signatureLevel = 'electronic_signature';
    /**
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var FromScratch1RedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var FromScratch1CustomText|null
     */
    protected $customText;
    /**
     * Override the delivery mode of the Signature Request for this Signer.
     *
     * @var string|null
     */
    protected $deliveryMode;

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * Create new signer.
     */
    public function getInfo(): ?SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo
    {
        return $this->info;
    }

    /**
     * Create new signer.
     */
    public function setInfo(?SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    public function setSignatureLevel(?string $signatureLevel): self
    {
        $this->initialized['signatureLevel'] = true;
        $this->signatureLevel = $signatureLevel;

        return $this;
    }

    public function getSignatureAuthenticationMode(): ?string
    {
        return $this->signatureAuthenticationMode;
    }

    public function setSignatureAuthenticationMode(?string $signatureAuthenticationMode): self
    {
        $this->initialized['signatureAuthenticationMode'] = true;
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;

        return $this;
    }

    public function getRedirectUrls(): ?FromScratch1RedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?FromScratch1RedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?FromScratch1CustomText
    {
        return $this->customText;
    }

    public function setCustomText(?FromScratch1CustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    /**
     * Override the delivery mode of the Signature Request for this Signer.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * Override the delivery mode of the Signature Request for this Signer.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }
}
