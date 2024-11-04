<?php

namespace Qdequippe\Yousign\Api\Model;

class VideoIdentityVerificationCreated extends \ArrayObject
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
     * The URL of the verification page that the user used to begin the verification process.
     *
     * @var string|null
     */
    protected $verificationUrl;

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

    /**
     * The URL of the verification page that the user used to begin the verification process.
     */
    public function getVerificationUrl(): ?string
    {
        return $this->verificationUrl;
    }

    /**
     * The URL of the verification page that the user used to begin the verification process.
     */
    public function setVerificationUrl(?string $verificationUrl): self
    {
        $this->initialized['verificationUrl'] = true;
        $this->verificationUrl = $verificationUrl;

        return $this;
    }
}
