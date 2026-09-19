<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class User implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $firstName;
    /**
     * @var string|null
     */
    protected $lastName;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * E.164 format.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * @var string|null
     */
    protected $locale;
    /**
     * @var string|null
     */
    protected $avatar;
    /**
     * @var string|null
     */
    protected $jobTitle;
    /**
     * @var bool|null
     */
    protected $isActive;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * The role the User holds in the Organization.
     *
     * `workspace_admin` is part of an unreleased feature. It cannot be assigned through the API, and its name, type and behavior may change before release. Do not use it.
     *
     * @var string|null
     */
    protected $role;
    /**
     * @var list<UserWorkspacesInner>|null
     */
    protected $workspaces;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * The application used to create the `User`.
     *
     * @var string|null
     */
    protected $source;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * E.164 format.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * E.164 format.
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->initialized['avatar'] = true;
        $this->avatar = $avatar;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): self
    {
        $this->initialized['jobTitle'] = true;
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->initialized['isActive'] = true;
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * The role the User holds in the Organization.
     *
     * `workspace_admin` is part of an unreleased feature. It cannot be assigned through the API, and its name, type and behavior may change before release. Do not use it.
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * The role the User holds in the Organization.
     *
     * `workspace_admin` is part of an unreleased feature. It cannot be assigned through the API, and its name, type and behavior may change before release. Do not use it.
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * @return list<UserWorkspacesInner>|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * @param list<UserWorkspacesInner>|null $workspaces
     */
    public function setWorkspaces(?array $workspaces): self
    {
        $this->initialized['workspaces'] = true;
        $this->workspaces = $workspaces;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * The application used to create the `User`.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The application used to create the `User`.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'email' => ['email', 'getEmail', 'setEmail'], 'phoneNumber' => ['phone_number', 'getPhoneNumber', 'setPhoneNumber'], 'locale' => ['locale', 'getLocale', 'setLocale'], 'avatar' => ['avatar', 'getAvatar', 'setAvatar'], 'jobTitle' => ['job_title', 'getJobTitle', 'setJobTitle'], 'isActive' => ['is_active', 'getIsActive', 'setIsActive'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'role' => ['role', 'getRole', 'setRole'], 'workspaces' => ['workspaces', 'getWorkspaces', 'setWorkspaces'], 'status' => ['status', 'getStatus', 'setStatus'], 'source' => ['source', 'getSource', 'setSource']];
    }
}
