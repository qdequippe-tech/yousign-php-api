<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateUser extends \ArrayObject
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
     * New role assigned to the User. It can be `member` or `admin`.
     *
     * @var string|null
     */
    protected $role;
    /**
     * If `true`, the User will be activated; if `false`, the User will be suspended.
     *
     * @var bool|null
     */
    protected $active;

    /**
     * New role assigned to the User. It can be `member` or `admin`.
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * New role assigned to the User. It can be `member` or `admin`.
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * If `true`, the User will be activated; if `false`, the User will be suspended.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * If `true`, the User will be activated; if `false`, the User will be suspended.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }
}
