<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateNaturalPersonMonitoring
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
     * First name of the natural person to watch.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the natural person to watch.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Date of birth of the natural person to watch (YYYY-MM-DD).
     *
     * @var \DateTime|null
     */
    protected $bornOn;
    /**
     * Scopes the Ongoing Monitoring to a specific Workspace.
     * Defaults to the default Workspace if not specified.
     *
     * @var string|null
     */
    protected $workspaceId;

    /**
     * First name of the natural person to watch.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the natural person to watch.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the natural person to watch.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the natural person to watch.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Date of birth of the natural person to watch (YYYY-MM-DD).
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * Date of birth of the natural person to watch (YYYY-MM-DD).
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * Scopes the Ongoing Monitoring to a specific Workspace.
     * Defaults to the default Workspace if not specified.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Scopes the Ongoing Monitoring to a specific Workspace.
     * Defaults to the default Workspace if not specified.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }
}
