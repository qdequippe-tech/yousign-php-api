<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateWorkflowSession
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
     * Unique ID of the Workflow Template from which to create the new Workflow Session.
     *
     * @var string|null
     */
    protected $workflowTemplateId;
    /**
     * Unique ID of the Workspace in which to scope the Workflow Session.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Name given to the Workflow Session. Enter a meaningful, descriptive name to help you easily find this Workflow Session in the application.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $name;

    /**
     * Unique ID of the Workflow Template from which to create the new Workflow Session.
     */
    public function getWorkflowTemplateId(): ?string
    {
        return $this->workflowTemplateId;
    }

    /**
     * Unique ID of the Workflow Template from which to create the new Workflow Session.
     */
    public function setWorkflowTemplateId(?string $workflowTemplateId): self
    {
        $this->initialized['workflowTemplateId'] = true;
        $this->workflowTemplateId = $workflowTemplateId;

        return $this;
    }

    /**
     * Unique ID of the Workspace in which to scope the Workflow Session.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Unique ID of the Workspace in which to scope the Workflow Session.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Name given to the Workflow Session. Enter a meaningful, descriptive name to help you easily find this Workflow Session in the application.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name given to the Workflow Session. Enter a meaningful, descriptive name to help you easily find this Workflow Session in the application.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
