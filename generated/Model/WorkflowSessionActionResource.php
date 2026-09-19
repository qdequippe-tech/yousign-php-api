<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowSessionActionResource implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Unique identifier of the Action. Corresponds to the ID of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     *
     * @var string|null
     */
    protected $id;
    /**
     * Creation date of the Action Resource.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Type of the Action.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Status of the Action. Corresponds to the status of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     *
     * @var string|null
     */
    protected $status;
    /**
     * ID of the previous attempt if this Action is a retry.
     *
     * @var string|null
     */
    protected $previousAttemptId;

    /**
     * Unique identifier of the Action. Corresponds to the ID of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Action. Corresponds to the ID of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Creation date of the Action Resource.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation date of the Action Resource.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Type of the Action.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the Action.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Status of the Action. Corresponds to the status of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Action. Corresponds to the status of the resources associated with this Workflow Session (Signature Request, Identity Document Verification, etc.).
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * ID of the previous attempt if this Action is a retry.
     */
    public function getPreviousAttemptId(): ?string
    {
        return $this->previousAttemptId;
    }

    /**
     * ID of the previous attempt if this Action is a retry.
     */
    public function setPreviousAttemptId(?string $previousAttemptId): self
    {
        $this->initialized['previousAttemptId'] = true;
        $this->previousAttemptId = $previousAttemptId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'type' => ['type', 'getType', 'setType'], 'status' => ['status', 'getStatus', 'setStatus'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId']];
    }
}
