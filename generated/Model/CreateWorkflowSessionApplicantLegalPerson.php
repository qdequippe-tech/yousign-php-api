<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateWorkflowSessionApplicantLegalPerson
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
     * Label of the Applicant.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Unique applicant identifier as registered on your side.
     *
     * @var string|null
     */
    protected $referenceId;
    /**
     * Delivery mode to notify Applicants.
     *
     * @var string|null
     */
    protected $deliveryMode = 'none';
    /**
     * Preferred email address for managing notifications, required if delivery_mode is set to email.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Type of the Applicant.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Contains information that describe the applicant. This data is used for cross-validation with the data Youtrust extracts from the applicant documents and verifications.
     *
     * @var CreateLegalPerson|null
     */
    protected $legalPerson;
    /**
     * The id of the parent Applicant (should be a legal_person in the same Workflow Session). Can be changed until the first magic link has been generated for the Workflow Session; once a link exists the parent is immutable and any attempt to change it returns a 400 error.
     *
     * @var string|null
     */
    protected $parentApplicantId;

    /**
     * Label of the Applicant.
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Label of the Applicant.
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * Unique applicant identifier as registered on your side.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Unique applicant identifier as registered on your side.
     */
    public function setReferenceId(?string $referenceId): self
    {
        $this->initialized['referenceId'] = true;
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * Delivery mode to notify Applicants.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * Delivery mode to notify Applicants.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }

    /**
     * Preferred email address for managing notifications, required if delivery_mode is set to email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Preferred email address for managing notifications, required if delivery_mode is set to email.
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * Type of the Applicant.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the Applicant.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Contains information that describe the applicant. This data is used for cross-validation with the data Youtrust extracts from the applicant documents and verifications.
     */
    public function getLegalPerson(): ?CreateLegalPerson
    {
        return $this->legalPerson;
    }

    /**
     * Contains information that describe the applicant. This data is used for cross-validation with the data Youtrust extracts from the applicant documents and verifications.
     */
    public function setLegalPerson(?CreateLegalPerson $legalPerson): self
    {
        $this->initialized['legalPerson'] = true;
        $this->legalPerson = $legalPerson;

        return $this;
    }

    /**
     * The id of the parent Applicant (should be a legal_person in the same Workflow Session). Can be changed until the first magic link has been generated for the Workflow Session; once a link exists the parent is immutable and any attempt to change it returns a 400 error.
     */
    public function getParentApplicantId(): ?string
    {
        return $this->parentApplicantId;
    }

    /**
     * The id of the parent Applicant (should be a legal_person in the same Workflow Session). Can be changed until the first magic link has been generated for the Workflow Session; once a link exists the parent is immutable and any attempt to change it returns a 400 error.
     */
    public function setParentApplicantId(?string $parentApplicantId): self
    {
        $this->initialized['parentApplicantId'] = true;
        $this->parentApplicantId = $parentApplicantId;

        return $this;
    }
}
