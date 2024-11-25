<?php

namespace Qdequippe\Yousign\Api\Model;

class UserInvitation extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $email;
    /**
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

    public function getRole(): ?string
    {
        return $this->role;
    }

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
}
