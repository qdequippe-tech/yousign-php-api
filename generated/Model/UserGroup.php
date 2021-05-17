<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class UserGroup
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Name of the UserGroup.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Permissions of UserGroup.
     *
     * @var string[]|null
     */
    protected $permissions;

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the UserGroup.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the UserGroup.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Permissions of UserGroup.
     *
     * @return string[]|null
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * Permissions of UserGroup.
     *
     * @param string[]|null $permissions
     */
    public function setPermissions(?array $permissions): self
    {
        $this->permissions = $permissions;

        return $this;
    }
}
