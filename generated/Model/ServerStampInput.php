<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ServerStampInput
{
    /**
     * Resource file uri.
     *
     * @var string|null
     */
    protected $file;
    /**
     * Resource certificate uri (please contact support for more informations).
     *
     * @var string|null
     */
    protected $certificate;
    /**
     * @var ServerStampConfig[]|null
     */
    protected $config;
    /**
     * @var FileObjectInputWithoutFileReference[]|null
     */
    protected $fileObjects;
    /**
     * Image signature in base 64.
     *
     * @var string|null
     */
    protected $signImage;

    /**
     * Resource file uri.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Resource file uri.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Resource certificate uri (please contact support for more informations).
     */
    public function getCertificate(): ?string
    {
        return $this->certificate;
    }

    /**
     * Resource certificate uri (please contact support for more informations).
     */
    public function setCertificate(?string $certificate): self
    {
        $this->certificate = $certificate;

        return $this;
    }

    /**
     * @return ServerStampConfig[]|null
     */
    public function getConfig(): ?array
    {
        return $this->config;
    }

    /**
     * @param ServerStampConfig[]|null $config
     */
    public function setConfig(?array $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return FileObjectInputWithoutFileReference[]|null
     */
    public function getFileObjects(): ?array
    {
        return $this->fileObjects;
    }

    /**
     * @param FileObjectInputWithoutFileReference[]|null $fileObjects
     */
    public function setFileObjects(?array $fileObjects): self
    {
        $this->fileObjects = $fileObjects;

        return $this;
    }

    /**
     * Image signature in base 64.
     */
    public function getSignImage(): ?string
    {
        return $this->signImage;
    }

    /**
     * Image signature in base 64.
     */
    public function setSignImage(?string $signImage): self
    {
        $this->signImage = $signImage;

        return $this;
    }
}
