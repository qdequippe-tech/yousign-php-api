<?php

namespace Qdequippe\Yousign\Api\Model;

class WorkflowSessionLinks
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
     * List of Applicants with their portal links. A root Applicant's entry covers its child Applicants, so child Applicants are not returned as separate entries.
     *
     * @var list<WorkflowSessionLinksApplicantsInner>|null
     */
    protected $applicants;

    /**
     * List of Applicants with their portal links. A root Applicant's entry covers its child Applicants, so child Applicants are not returned as separate entries.
     *
     * @return list<WorkflowSessionLinksApplicantsInner>|null
     */
    public function getApplicants(): ?array
    {
        return $this->applicants;
    }

    /**
     * List of Applicants with their portal links. A root Applicant's entry covers its child Applicants, so child Applicants are not returned as separate entries.
     *
     * @param list<WorkflowSessionLinksApplicantsInner>|null $applicants
     */
    public function setApplicants(?array $applicants): self
    {
        $this->initialized['applicants'] = true;
        $this->applicants = $applicants;

        return $this;
    }
}
