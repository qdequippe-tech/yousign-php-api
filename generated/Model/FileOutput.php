<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class FileOutput
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Name of the file.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Type of file.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Type of content.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Description of the file.
     *
     * @var string|null
     */
    protected $description;
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
     * Metadata of the file.
     *
     * @var FileOutputMetadata|null
     */
    protected $metadata;
    /**
     * Id of workspace.
     *
     * @var string|null
     */
    protected $workspace;
    /**
     * Id of creator.
     *
     * @var string|null
     */
    protected $creator;
    /**
     * File hash.
     *
     * @var string|null
     */
    protected $sha256;
    /**
     * @var int|null
     */
    protected $position = 0;

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the file.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the file.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Type of file.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of file.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Type of content.
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * Type of content.
     */
    public function setContentType(?string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Description of the file.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description of the file.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * Metadata of the file.
     */
    public function getMetadata(): ?FileOutputMetadata
    {
        return $this->metadata;
    }

    /**
     * Metadata of the file.
     */
    public function setMetadata(?FileOutputMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Id of workspace.
     */
    public function getWorkspace(): ?string
    {
        return $this->workspace;
    }

    /**
     * Id of workspace.
     */
    public function setWorkspace(?string $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }

    /**
     * Id of creator.
     */
    public function getCreator(): ?string
    {
        return $this->creator;
    }

    /**
     * Id of creator.
     */
    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * File hash.
     */
    public function getSha256(): ?string
    {
        return $this->sha256;
    }

    /**
     * File hash.
     */
    public function setSha256(?string $sha256): self
    {
        $this->sha256 = $sha256;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }
}
