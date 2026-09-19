<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateBankAccountLookupWithNaturalPerson
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
     * The International Bank Account Number (IBAN) to verify.
     * The IBAN must be a valid IBAN from a supported country: AT, BE, HR, CY, EE, FI, FR, DE, GR, IE, IT, LV, LT, LU, MT, NL, PT, SK, SI, ES.
     *
     * @var string|null
     */
    protected $iban;
    /**
     * Information about the natural person who owns the bank account.
     *
     * @var InitiateBankAccountLookupWithNaturalPersonNaturalPerson|null
     */
    protected $naturalPerson;
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
     * The International Bank Account Number (IBAN) to verify.
     * The IBAN must be a valid IBAN from a supported country: AT, BE, HR, CY, EE, FI, FR, DE, GR, IE, IT, LV, LT, LU, MT, NL, PT, SK, SI, ES.
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * The International Bank Account Number (IBAN) to verify.
     * The IBAN must be a valid IBAN from a supported country: AT, BE, HR, CY, EE, FI, FR, DE, GR, IE, IT, LV, LT, LU, MT, NL, PT, SK, SI, ES.
     */
    public function setIban(?string $iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    /**
     * Information about the natural person who owns the bank account.
     */
    public function getNaturalPerson(): ?InitiateBankAccountLookupWithNaturalPersonNaturalPerson
    {
        return $this->naturalPerson;
    }

    /**
     * Information about the natural person who owns the bank account.
     */
    public function setNaturalPerson(?InitiateBankAccountLookupWithNaturalPersonNaturalPerson $naturalPerson): self
    {
        $this->initialized['naturalPerson'] = true;
        $this->naturalPerson = $naturalPerson;

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
}
