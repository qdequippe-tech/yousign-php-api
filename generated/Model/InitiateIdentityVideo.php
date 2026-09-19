<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateIdentityVideo
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
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     *
     * @var string|null
     */
    protected $redirectionUrl;
    /**
     * Enable face recognition step in the identity verification flow.
     *
     * @var bool|null
     */
    protected $faceRecognition = false;
    /**
     * Enable PVID mode in the identity verification flow.
     *
     * @var bool|null
     */
    protected $pvid = false;
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
     * Minimum age required for the document holder.
     *
     * @var int|null
     */
    protected $minAge;
    /**
     * Maximum age allowed for the document holder.
     *
     * @var int|null
     */
    protected $maxAge;
    /**
     * List of prohibited issuing countries (ISO 3166-1 alpha-2).
     *
     * @var list<string>|null
     */
    protected $prohibitedCountries;
    /**
     * Pre-fill the residence country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     *
     * @var string|null
     */
    protected $preSelectedResidenceCountryCode;
    /**
     * Pre-fill the document issuing country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     *
     * @var string|null
     */
    protected $preSelectedDocumentIssuingCountryCode;
    /**
     * Pre-fill the document type in the verification flow.
     *
     * @var string|null
     */
    protected $preSelectedDocumentType;
    /**
     * Pre-fill the UI language of the verification flow (ISO 639-1, lowercase 2-letter code).
     *
     * @var string|null
     */
    protected $preSelectedLocale;

    /**
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     */
    public function getRedirectionUrl(): ?string
    {
        return $this->redirectionUrl;
    }

    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     */
    public function setRedirectionUrl(?string $redirectionUrl): self
    {
        $this->initialized['redirectionUrl'] = true;
        $this->redirectionUrl = $redirectionUrl;

        return $this;
    }

    /**
     * Enable face recognition step in the identity verification flow.
     */
    public function getFaceRecognition(): ?bool
    {
        return $this->faceRecognition;
    }

    /**
     * Enable face recognition step in the identity verification flow.
     */
    public function setFaceRecognition(?bool $faceRecognition): self
    {
        $this->initialized['faceRecognition'] = true;
        $this->faceRecognition = $faceRecognition;

        return $this;
    }

    /**
     * Enable PVID mode in the identity verification flow.
     */
    public function getPvid(): ?bool
    {
        return $this->pvid;
    }

    /**
     * Enable PVID mode in the identity verification flow.
     */
    public function setPvid(?bool $pvid): self
    {
        $this->initialized['pvid'] = true;
        $this->pvid = $pvid;

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

    /**
     * Minimum age required for the document holder.
     */
    public function getMinAge(): ?int
    {
        return $this->minAge;
    }

    /**
     * Minimum age required for the document holder.
     */
    public function setMinAge(?int $minAge): self
    {
        $this->initialized['minAge'] = true;
        $this->minAge = $minAge;

        return $this;
    }

    /**
     * Maximum age allowed for the document holder.
     */
    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    /**
     * Maximum age allowed for the document holder.
     */
    public function setMaxAge(?int $maxAge): self
    {
        $this->initialized['maxAge'] = true;
        $this->maxAge = $maxAge;

        return $this;
    }

    /**
     * List of prohibited issuing countries (ISO 3166-1 alpha-2).
     *
     * @return list<string>|null
     */
    public function getProhibitedCountries(): ?array
    {
        return $this->prohibitedCountries;
    }

    /**
     * List of prohibited issuing countries (ISO 3166-1 alpha-2).
     *
     * @param list<string>|null $prohibitedCountries
     */
    public function setProhibitedCountries(?array $prohibitedCountries): self
    {
        $this->initialized['prohibitedCountries'] = true;
        $this->prohibitedCountries = $prohibitedCountries;

        return $this;
    }

    /**
     * Pre-fill the residence country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     */
    public function getPreSelectedResidenceCountryCode(): ?string
    {
        return $this->preSelectedResidenceCountryCode;
    }

    /**
     * Pre-fill the residence country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     */
    public function setPreSelectedResidenceCountryCode(?string $preSelectedResidenceCountryCode): self
    {
        $this->initialized['preSelectedResidenceCountryCode'] = true;
        $this->preSelectedResidenceCountryCode = $preSelectedResidenceCountryCode;

        return $this;
    }

    /**
     * Pre-fill the document issuing country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     */
    public function getPreSelectedDocumentIssuingCountryCode(): ?string
    {
        return $this->preSelectedDocumentIssuingCountryCode;
    }

    /**
     * Pre-fill the document issuing country in the verification flow (ISO 3166-1 alpha-2, uppercase).
     */
    public function setPreSelectedDocumentIssuingCountryCode(?string $preSelectedDocumentIssuingCountryCode): self
    {
        $this->initialized['preSelectedDocumentIssuingCountryCode'] = true;
        $this->preSelectedDocumentIssuingCountryCode = $preSelectedDocumentIssuingCountryCode;

        return $this;
    }

    /**
     * Pre-fill the document type in the verification flow.
     */
    public function getPreSelectedDocumentType(): ?string
    {
        return $this->preSelectedDocumentType;
    }

    /**
     * Pre-fill the document type in the verification flow.
     */
    public function setPreSelectedDocumentType(?string $preSelectedDocumentType): self
    {
        $this->initialized['preSelectedDocumentType'] = true;
        $this->preSelectedDocumentType = $preSelectedDocumentType;

        return $this;
    }

    /**
     * Pre-fill the UI language of the verification flow (ISO 639-1, lowercase 2-letter code).
     */
    public function getPreSelectedLocale(): ?string
    {
        return $this->preSelectedLocale;
    }

    /**
     * Pre-fill the UI language of the verification flow (ISO 639-1, lowercase 2-letter code).
     */
    public function setPreSelectedLocale(?string $preSelectedLocale): self
    {
        $this->initialized['preSelectedLocale'] = true;
        $this->preSelectedLocale = $preSelectedLocale;

        return $this;
    }
}
