<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class DuplicateASignatureRequest implements AdditionalPropertiesInterface
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
     * ID of the signature request to duplicate.
     *
     * @var string|null
     */
    protected $signatureRequestId;
    /**
     * The name of the new Signature Request.
     *
     * @var string|null
     */
    protected $name;
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
     * Embedded Preparation settings for this Signature Request.
     *
     * @var SignatureRequestEmbeddedPreparation|null
     */
    protected $embeddedPreparation;

    /**
     * ID of the signature request to duplicate.
     */
    public function getSignatureRequestId(): ?string
    {
        return $this->signatureRequestId;
    }

    /**
     * ID of the signature request to duplicate.
     */
    public function setSignatureRequestId(?string $signatureRequestId): self
    {
        $this->initialized['signatureRequestId'] = true;
        $this->signatureRequestId = $signatureRequestId;

        return $this;
    }

    /**
     * The name of the new Signature Request.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The name of the new Signature Request.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

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

    /**
     * Embedded Preparation settings for this Signature Request.
     */
    public function getEmbeddedPreparation(): ?SignatureRequestEmbeddedPreparation
    {
        return $this->embeddedPreparation;
    }

    /**
     * Embedded Preparation settings for this Signature Request.
     */
    public function setEmbeddedPreparation(?SignatureRequestEmbeddedPreparation $embeddedPreparation): self
    {
        $this->initialized['embeddedPreparation'] = true;
        $this->embeddedPreparation = $embeddedPreparation;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signatureRequestId' => ['signature_request_id', 'getSignatureRequestId', 'setSignatureRequestId'], 'name' => ['name', 'getName', 'setName'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId'], 'embeddedPreparation' => ['embedded_preparation', 'getEmbeddedPreparation', 'setEmbeddedPreparation']];
    }
}
