<?php

namespace Qdequippe\Yousign\Api\Model;

class WorkflowSession
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
     * Unique identifier of the Workflow Session.
     *
     * @var string|null
     */
    protected $id;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Name given to the Workflow Session. Used to easily find it in the application.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Unique identifier of the Workflow Template from which this Workflow Session was created.
     *
     * @var string|null
     */
    protected $workflowTemplateId;
    /**
     * Unique identifier of the Workspace in which this Workflow Session is scoped.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Status of the Workflow Session.
     *
     * @var string|null
     */
    protected $status;
    /**
     * List of the Action Groups contained in the Workflow Session.
     *
     * @var list<WorkflowSessionActionGroupsInner>|null
     */
    protected $actionGroups;

    /**
     * Unique identifier of the Workflow Session.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Workflow Session.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

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

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Name given to the Workflow Session. Used to easily find it in the application.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name given to the Workflow Session. Used to easily find it in the application.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Unique identifier of the Workflow Template from which this Workflow Session was created.
     */
    public function getWorkflowTemplateId(): ?string
    {
        return $this->workflowTemplateId;
    }

    /**
     * Unique identifier of the Workflow Template from which this Workflow Session was created.
     */
    public function setWorkflowTemplateId(?string $workflowTemplateId): self
    {
        $this->initialized['workflowTemplateId'] = true;
        $this->workflowTemplateId = $workflowTemplateId;

        return $this;
    }

    /**
     * Unique identifier of the Workspace in which this Workflow Session is scoped.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Unique identifier of the Workspace in which this Workflow Session is scoped.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Status of the Workflow Session.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Workflow Session.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * List of the Action Groups contained in the Workflow Session.
     *
     * @return list<WorkflowSessionActionGroupsInner>|null
     */
    public function getActionGroups(): ?array
    {
        return $this->actionGroups;
    }

    /**
     * List of the Action Groups contained in the Workflow Session.
     *
     * @param list<WorkflowSessionActionGroupsInner>|null $actionGroups
     */
    public function setActionGroups(?array $actionGroups): self
    {
        $this->initialized['actionGroups'] = true;
        $this->actionGroups = $actionGroups;

        return $this;
    }
}
