<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class OperationOutput
{
    /**
     * Id of operation.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Last date of update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var AuthenticationInweboOutput|null
     */
    protected $authentication;
    /**
     * Mode of authentication.
     *
     * @var string|null
     */
    protected $mode;
    /**
     * Status of operation.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Type of operation.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Metadata of the operation.
     *
     * @var OperationOutputMetadata|null
     */
    protected $metadata;

    /**
     * Id of operation.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of operation.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

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
     * Last date of update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Last date of update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAuthentication(): ?AuthenticationInweboOutput
    {
        return $this->authentication;
    }

    public function setAuthentication(?AuthenticationInweboOutput $authentication): self
    {
        $this->authentication = $authentication;

        return $this;
    }

    /**
     * Mode of authentication.
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }

    /**
     * Mode of authentication.
     */
    public function setMode(?string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Status of operation.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of operation.
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Type of operation.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of operation.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Metadata of the operation.
     */
    public function getMetadata(): ?OperationOutputMetadata
    {
        return $this->metadata;
    }

    /**
     * Metadata of the operation.
     */
    public function setMetadata(?OperationOutputMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }
}
