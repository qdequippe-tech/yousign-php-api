<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateCompanyFromApplicant
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
     * The Applicant ID linked to the Workflow Session.
     *
     * @var string|null
     */
    protected $applicantId;

    /**
     * The Applicant ID linked to the Workflow Session.
     */
    public function getApplicantId(): ?string
    {
        return $this->applicantId;
    }

    /**
     * The Applicant ID linked to the Workflow Session.
     */
    public function setApplicantId(?string $applicantId): self
    {
        $this->initialized['applicantId'] = true;
        $this->applicantId = $applicantId;

        return $this;
    }
}
