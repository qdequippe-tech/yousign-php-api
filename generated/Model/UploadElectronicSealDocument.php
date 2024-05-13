<?php

namespace Qdequippe\Yousign\Api\Model;

class UploadElectronicSealDocument extends \ArrayObject
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
     * PDF file.
     *
     * @var string|null
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $password;

    /**
     * PDF file.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * PDF file.
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }
}
