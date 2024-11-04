<?php

namespace Qdequippe\Yousign\Api\Model;

class VideoIdentityVerificationDeclared extends \ArrayObject
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
     * declared full name.
     *
     * @var string|null
     */
    protected $fullName;

    /**
     * declared full name.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * declared full name.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }
}
