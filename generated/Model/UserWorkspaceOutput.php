<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class UserWorkspaceOutput
{
    /**
     * Object's ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Workspace name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Object's ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Object's ID.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Workspace name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Workspace name.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
