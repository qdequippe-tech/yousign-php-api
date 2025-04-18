<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestSignerFromInfoInput extends \ArrayObject
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
     * create new signer.
     *
     * @var SignatureRequestSignerFromInfoInputInfo|null
     */
    protected $info;
    /**
     * @var list<array<string, mixed>>|null
     */
    protected $fields;
    /**
     * @var string|null
     */
    protected $signatureLevel = 'electronic_signature';
    /**
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var SignatureRequestSignerFromInfoInputRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var SignatureRequestSignerFromInfoInputCustomText|null
     */
    protected $customText;

    /**
     * create new signer.
     */
    public function getInfo(): ?SignatureRequestSignerFromInfoInputInfo
    {
        return $this->info;
    }

    /**
     * create new signer.
     */
    public function setInfo(?SignatureRequestSignerFromInfoInputInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    /**
     * @return list<array<string, mixed>>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param list<array<string, mixed>>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

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

    public function getRedirectUrls(): ?SignatureRequestSignerFromInfoInputRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignatureRequestSignerFromInfoInputRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?SignatureRequestSignerFromInfoInputCustomText
    {
        return $this->customText;
    }

    public function setCustomText(?SignatureRequestSignerFromInfoInputCustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }
}
