<?php

namespace Qdequippe\Yousign\Api\Model;

class VideoIdentityVerificationVerified extends \ArrayObject
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
     * Full name on the document.
     *
     * @var string|null
     */
    protected $fullName;

    /**
     * Full name on the document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name on the document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }
}
