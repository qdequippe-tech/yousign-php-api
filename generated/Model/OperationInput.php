<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class OperationInput
{
    /**
     * Type of operation.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Mode of authentication.
     *
     * @var string|null
     */
    protected $mode;
    /**
     * @var bool|null
     */
    protected $allMembers = false;
    /**
     * @var string[]|null
     */
    protected $members;
    /**
     * Status of operation.
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $comment;
    /**
     * Metadata of the operation.
     *
     * @var OperationInputMetadata|null
     */
    protected $metadata;

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

    public function getAllMembers(): ?bool
    {
        return $this->allMembers;
    }

    public function setAllMembers(?bool $allMembers): self
    {
        $this->allMembers = $allMembers;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * @param string[]|null $members
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Metadata of the operation.
     */
    public function getMetadata(): ?OperationInputMetadata
    {
        return $this->metadata;
    }

    /**
     * Metadata of the operation.
     */
    public function setMetadata(?OperationInputMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }
}
