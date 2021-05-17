<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ServerStampOutput
{
    /**
     * Resource server stamp uri.
     *
     * @var string|null
     */
    protected $id;
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
     * @var FileObjectOutputWithoutFileReference[]|null
     */
    protected $fileObjects;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Date of end.
     *
     * @var \DateTime|null
     */
    protected $finishedAt;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Resource workspace uri.
     *
     * @var string|null
     */
    protected $workspace;

    /**
     * Resource server stamp uri.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Resource server stamp uri.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

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
     * @return FileObjectOutputWithoutFileReference[]|null
     */
    public function getFileObjects(): ?array
    {
        return $this->fileObjects;
    }

    /**
     * @param FileObjectOutputWithoutFileReference[]|null $fileObjects
     */
    public function setFileObjects(?array $fileObjects): self
    {
        $this->fileObjects = $fileObjects;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Date of end.
     */
    public function getFinishedAt(): ?\DateTime
    {
        return $this->finishedAt;
    }

    /**
     * Date of end.
     */
    public function setFinishedAt(?\DateTime $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Resource workspace uri.
     */
    public function getWorkspace(): ?string
    {
        return $this->workspace;
    }

    /**
     * Resource workspace uri.
     */
    public function setWorkspace(?string $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }
}
