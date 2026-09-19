<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;

class InitiateIdentityDocument
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
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The document type to verify.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * Additional document file, such as the back side of an identity card.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $additionalFile;
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
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The document type to verify.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The document type to verify.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The identity document file to verify.
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
     * The identity document file to verify.
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
     * Additional document file, such as the back side of an identity card.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getAdditionalFile()
    {
        return $this->additionalFile;
    }

    /**
     * Additional document file, such as the back side of an identity card.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @param string|resource|StreamInterface|null $additionalFile
     */
    public function setAdditionalFile($additionalFile): self
    {
        $this->initialized['additionalFile'] = true;
        $this->additionalFile = $additionalFile;

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
}
