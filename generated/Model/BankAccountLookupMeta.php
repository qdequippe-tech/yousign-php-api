<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BankAccountLookupMeta implements AdditionalPropertiesInterface
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
     * The unique identifier for a resource.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The Workspace ID in which the verification has been created.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Creation date of the Bank Account Lookup Verification.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Update date of the Bank Account Lookup Verification.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Status of the Bank Account Lookup Verification.
     *
     * @var string|null
     */
    protected $status;
    /**
     * List of status codes. Indicates the cause when the status is `failed` or `inconclusive`.
     *
     * @var list<string>|null
     */
    protected $statusCodes;
    /**
     * Indicates if the Bank Account Lookup Verification data has been anonymized.
     * If set to `true`, all fields in the `data` field are set to NULL.
     *
     * @var bool|null
     */
    protected $dataAnonymized;
    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     *
     * @var string|null
     */
    protected $workflowSessionId;
    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     *
     * @var string|null
     */
    protected $previousAttemptId;

    /**
     * The unique identifier for a resource.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The unique identifier for a resource.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The Workspace ID in which the verification has been created.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * The Workspace ID in which the verification has been created.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Creation date of the Bank Account Lookup Verification.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation date of the Bank Account Lookup Verification.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Update date of the Bank Account Lookup Verification.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Update date of the Bank Account Lookup Verification.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Status of the Bank Account Lookup Verification.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Bank Account Lookup Verification.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * List of status codes. Indicates the cause when the status is `failed` or `inconclusive`.
     *
     * @return list<string>|null
     */
    public function getStatusCodes(): ?array
    {
        return $this->statusCodes;
    }

    /**
     * List of status codes. Indicates the cause when the status is `failed` or `inconclusive`.
     *
     * @param list<string>|null $statusCodes
     */
    public function setStatusCodes(?array $statusCodes): self
    {
        $this->initialized['statusCodes'] = true;
        $this->statusCodes = $statusCodes;

        return $this;
    }

    /**
     * Indicates if the Bank Account Lookup Verification data has been anonymized.
     * If set to `true`, all fields in the `data` field are set to NULL.
     */
    public function getDataAnonymized(): ?bool
    {
        return $this->dataAnonymized;
    }

    /**
     * Indicates if the Bank Account Lookup Verification data has been anonymized.
     * If set to `true`, all fields in the `data` field are set to NULL.
     */
    public function setDataAnonymized(?bool $dataAnonymized): self
    {
        $this->initialized['dataAnonymized'] = true;
        $this->dataAnonymized = $dataAnonymized;

        return $this;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function getWorkflowSessionId(): ?string
    {
        return $this->workflowSessionId;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function setWorkflowSessionId(?string $workflowSessionId): self
    {
        $this->initialized['workflowSessionId'] = true;
        $this->workflowSessionId = $workflowSessionId;

        return $this;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function getPreviousAttemptId(): ?string
    {
        return $this->previousAttemptId;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function setPreviousAttemptId(?string $previousAttemptId): self
    {
        $this->initialized['previousAttemptId'] = true;
        $this->previousAttemptId = $previousAttemptId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'updatedAt' => ['updated_at', 'getUpdatedAt', 'setUpdatedAt'], 'status' => ['status', 'getStatus', 'setStatus'], 'statusCodes' => ['status_codes', 'getStatusCodes', 'setStatusCodes'], 'dataAnonymized' => ['data_anonymized', 'getDataAnonymized', 'setDataAnonymized'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId']];
    }
}
