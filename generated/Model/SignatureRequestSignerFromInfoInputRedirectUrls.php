<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestSignerFromInfoInputRedirectUrls
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
     * URL the Signer is redirected to after a successful signature.
     *
     * @var string|null
     */
    protected $success;
    /**
     * URL the Signer is redirected to after a signature error.
     *
     * @var string|null
     */
    protected $error;

    /**
     * URL the Signer is redirected to after a successful signature.
     */
    public function getSuccess(): ?string
    {
        return $this->success;
    }

    /**
     * URL the Signer is redirected to after a successful signature.
     */
    public function setSuccess(?string $success): self
    {
        $this->initialized['success'] = true;
        $this->success = $success;

        return $this;
    }

    /**
     * URL the Signer is redirected to after a signature error.
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * URL the Signer is redirected to after a signature error.
     */
    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }
}
