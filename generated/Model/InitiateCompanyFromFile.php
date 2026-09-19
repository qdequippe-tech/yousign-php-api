<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateCompanyFromFile implements AdditionalPropertiesInterface
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
     * The file containing the company details mostly known as Kbis.
     * Accepted formats: PDF.
     * Max size: 10 MB.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * Scopes the verification to a specific workspace.
     * Defaults to the default workspace if not specified.
     *
     * @var string|null
     */
    protected $workspaceId;
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
     * The file containing the company details mostly known as Kbis.
     * Accepted formats: PDF.
     * Max size: 10 MB.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * The file containing the company details mostly known as Kbis.
     * Accepted formats: PDF.
     * Max size: 10 MB.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Scopes the verification to a specific workspace.
     * Defaults to the default workspace if not specified.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Scopes the verification to a specific workspace.
     * Defaults to the default workspace if not specified.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

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
        return ['file' => ['file', 'getFile', 'setFile'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId']];
    }
}
