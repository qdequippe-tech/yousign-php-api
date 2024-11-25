<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateUser extends \ArrayObject
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
     * The email address must not match any existing User's email.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Role assigned to the User in the Organization.
     *
     * @var string|null
     */
    protected $role;
    /**
     * Locale settings used for communication.
     *
     * @var string|null
     */
    protected $locale;
    /**
     * The new User must be associated with at least one Workspace in the Organization.
     *
     * @var list<string>|null
     */
    protected $workspaces;
    /**
     * User's first name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * User's last name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * E.164 format.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $jobTitle;

    /**
     * The email address must not match any existing User's email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * The email address must not match any existing User's email.
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * Role assigned to the User in the Organization.
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * Role assigned to the User in the Organization.
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * Locale settings used for communication.
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * Locale settings used for communication.
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;

        return $this;
    }

    /**
     * The new User must be associated with at least one Workspace in the Organization.
     *
     * @return list<string>|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * The new User must be associated with at least one Workspace in the Organization.
     *
     * @param list<string>|null $workspaces
     */
    public function setWorkspaces(?array $workspaces): self
    {
        $this->initialized['workspaces'] = true;
        $this->workspaces = $workspaces;

        return $this;
    }

    /**
     * User's first name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * User's first name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * User's last name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * User's last name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

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

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setJobTitle(?string $jobTitle): self
    {
        $this->initialized['jobTitle'] = true;
        $this->jobTitle = $jobTitle;

        return $this;
    }
}
