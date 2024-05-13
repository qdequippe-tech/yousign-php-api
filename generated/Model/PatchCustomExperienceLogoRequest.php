<?php

namespace Qdequippe\Yousign\Api\Model;

class PatchCustomExperienceLogoRequest extends \ArrayObject
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
    protected $file;

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }
}
