<?php

namespace Qdequippe\Yousign\Api\Model;

class UploadElectronicSealImage extends \ArrayObject
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
     * Seal image.
     *
     * @var string|null
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $name;

    /**
     * Seal image.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Seal image.
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
