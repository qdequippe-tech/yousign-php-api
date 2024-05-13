<?php

namespace Qdequippe\Yousign\Api\Model;

class CustomExperienceRedirectUrls extends \ArrayObject
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
}
