<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestSignerFromUserIdInput extends \ArrayObject
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
     * Create signer from an existing user.
     *
     * @var string|null
     */
    protected $userId;
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
     * @var FromScratch1CustomText|null
     */
    protected $customText;

    /**
     * Create signer from an existing user.
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Create signer from an existing user.
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;

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
}
