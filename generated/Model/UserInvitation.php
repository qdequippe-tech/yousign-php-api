<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UserInvitation implements AdditionalPropertiesInterface
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
    protected $email;
    /**
     * The role the invited User will hold in the Organization.
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
     * @var \DateTime|null
     */
    protected $expiredAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;

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
     * The role the invited User will hold in the Organization.
     *
     * `workspace_admin` is part of an unreleased feature. It cannot be assigned through the API, and its name, type and behavior may change before release. Do not use it.
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * The role the invited User will hold in the Organization.
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

    public function getExpiredAt(): ?\DateTime
    {
        return $this->expiredAt;
    }

    public function setExpiredAt(?\DateTime $expiredAt): self
    {
        $this->initialized['expiredAt'] = true;
        $this->expiredAt = $expiredAt;

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

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'email' => ['email', 'getEmail', 'setEmail'], 'role' => ['role', 'getRole', 'setRole'], 'workspaces' => ['workspaces', 'getWorkspaces', 'setWorkspaces'], 'expiredAt' => ['expired_at', 'getExpiredAt', 'setExpiredAt'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt']];
    }
}
