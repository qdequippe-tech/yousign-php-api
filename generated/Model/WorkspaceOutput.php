<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class WorkspaceOutput
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
     * @var WorkspaceConfig|null
     */
    protected $config;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $emailProcedureFromName;
    /**
     * @var string[]|null
     */
    protected $contactFieldVisibility;
    /**
     * @var string|null
     */
    protected $slug;
    /**
     * @var bool|null
     */
    protected $hasCustomLogo;

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

    public function getConfig(): ?WorkspaceConfig
    {
        return $this->config;
    }

    public function setConfig(?WorkspaceConfig $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEmailProcedureFromName(): ?string
    {
        return $this->emailProcedureFromName;
    }

    public function setEmailProcedureFromName(?string $emailProcedureFromName): self
    {
        $this->emailProcedureFromName = $emailProcedureFromName;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getContactFieldVisibility(): ?array
    {
        return $this->contactFieldVisibility;
    }

    /**
     * @param string[]|null $contactFieldVisibility
     */
    public function setContactFieldVisibility(?array $contactFieldVisibility): self
    {
        $this->contactFieldVisibility = $contactFieldVisibility;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getHasCustomLogo(): ?bool
    {
        return $this->hasCustomLogo;
    }

    public function setHasCustomLogo(?bool $hasCustomLogo): self
    {
        $this->hasCustomLogo = $hasCustomLogo;

        return $this;
    }
}
