<?php

namespace Qdequippe\Yousign\Api\Model;

class WorkflowSessionLinksApplicantsInner
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
     * Unique identifier of the Applicant.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Unique identifier of the Workflow Session.
     *
     * @var string|null
     */
    protected $workflowSessionId;
    /**
     * URL of the portal link for this Applicant.
     *
     * @var string|null
     */
    protected $workflowSessionLinkUrl;
    /**
     * Expiration date of the portal link.
     *
     * @var \DateTime|null
     */
    protected $workflowSessionLinkExpiresAt;
    /**
     * Status of the Applicant.
     *
     * @var string|null
     */
    protected $status;
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
     * Creation date of the Applicant.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Last update date of the Applicant.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Type of the Applicant.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The id of the parent Applicant. Always null on this endpoint, since only root and standalone Applicants are returned; kept for contract symmetry with the other Applicant responses.
     *
     * @var string|null
     */
    protected $parentApplicantId;
    /**
     * The ids of the child Applicants covered by this root Applicant's entry; empty for a natural_person or a childless root.
     *
     * @var list<string>|null
     */
    protected $childApplicantIds;

    /**
     * Unique identifier of the Applicant.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Applicant.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Unique identifier of the Workflow Session.
     */
    public function getWorkflowSessionId(): ?string
    {
        return $this->workflowSessionId;
    }

    /**
     * Unique identifier of the Workflow Session.
     */
    public function setWorkflowSessionId(?string $workflowSessionId): self
    {
        $this->initialized['workflowSessionId'] = true;
        $this->workflowSessionId = $workflowSessionId;

        return $this;
    }

    /**
     * URL of the portal link for this Applicant.
     */
    public function getWorkflowSessionLinkUrl(): ?string
    {
        return $this->workflowSessionLinkUrl;
    }

    /**
     * URL of the portal link for this Applicant.
     */
    public function setWorkflowSessionLinkUrl(?string $workflowSessionLinkUrl): self
    {
        $this->initialized['workflowSessionLinkUrl'] = true;
        $this->workflowSessionLinkUrl = $workflowSessionLinkUrl;

        return $this;
    }

    /**
     * Expiration date of the portal link.
     */
    public function getWorkflowSessionLinkExpiresAt(): ?\DateTime
    {
        return $this->workflowSessionLinkExpiresAt;
    }

    /**
     * Expiration date of the portal link.
     */
    public function setWorkflowSessionLinkExpiresAt(?\DateTime $workflowSessionLinkExpiresAt): self
    {
        $this->initialized['workflowSessionLinkExpiresAt'] = true;
        $this->workflowSessionLinkExpiresAt = $workflowSessionLinkExpiresAt;

        return $this;
    }

    /**
     * Status of the Applicant.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Applicant.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

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
     * Creation date of the Applicant.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation date of the Applicant.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Last update date of the Applicant.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Last update date of the Applicant.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

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
     * The id of the parent Applicant. Always null on this endpoint, since only root and standalone Applicants are returned; kept for contract symmetry with the other Applicant responses.
     */
    public function getParentApplicantId(): ?string
    {
        return $this->parentApplicantId;
    }

    /**
     * The id of the parent Applicant. Always null on this endpoint, since only root and standalone Applicants are returned; kept for contract symmetry with the other Applicant responses.
     */
    public function setParentApplicantId(?string $parentApplicantId): self
    {
        $this->initialized['parentApplicantId'] = true;
        $this->parentApplicantId = $parentApplicantId;

        return $this;
    }

    /**
     * The ids of the child Applicants covered by this root Applicant's entry; empty for a natural_person or a childless root.
     *
     * @return list<string>|null
     */
    public function getChildApplicantIds(): ?array
    {
        return $this->childApplicantIds;
    }

    /**
     * The ids of the child Applicants covered by this root Applicant's entry; empty for a natural_person or a childless root.
     *
     * @param list<string>|null $childApplicantIds
     */
    public function setChildApplicantIds(?array $childApplicantIds): self
    {
        $this->initialized['childApplicantIds'] = true;
        $this->childApplicantIds = $childApplicantIds;

        return $this;
    }
}
