<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerRedirectUrls extends \ArrayObject
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
    protected $success;
    /**
     * @var string|null
     */
    protected $error;
    /**
     * @var string|null
     */
    protected $decline;

    public function getSuccess(): ?string
    {
        return $this->success;
    }

    public function setSuccess(?string $success): self
    {
        $this->initialized['success'] = true;
        $this->success = $success;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }

    public function getDecline(): ?string
    {
        return $this->decline;
    }

    public function setDecline(?string $decline): self
    {
        $this->initialized['decline'] = true;
        $this->decline = $decline;

        return $this;
    }
}
