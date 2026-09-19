<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;

class InitiateBankAccountWithNaturalPerson
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
     * The file containing the bank account details.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * International Bank Account Number (IBAN).
     *
     * @var string|null
     */
    protected $iban;
    /**
     * Business Identifier Codes (BIC).
     *
     * @var string|null
     */
    protected $bic;
    /**
     * The field can not be submitted if field "legal_person" is provided.
     *
     * @var InitiateBankAccountWithNaturalPersonNaturalPerson|null
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
     * The file containing the bank account details.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * The file containing the bank account details.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * International Bank Account Number (IBAN).
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * International Bank Account Number (IBAN).
     */
    public function setIban(?string $iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    /**
     * Business Identifier Codes (BIC).
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * Business Identifier Codes (BIC).
     */
    public function setBic(?string $bic): self
    {
        $this->initialized['bic'] = true;
        $this->bic = $bic;

        return $this;
    }

    /**
     * The field can not be submitted if field "legal_person" is provided.
     */
    public function getNaturalPerson(): ?InitiateBankAccountWithNaturalPersonNaturalPerson
    {
        return $this->naturalPerson;
    }

    /**
     * The field can not be submitted if field "legal_person" is provided.
     */
    public function setNaturalPerson(?InitiateBankAccountWithNaturalPersonNaturalPerson $naturalPerson): self
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
