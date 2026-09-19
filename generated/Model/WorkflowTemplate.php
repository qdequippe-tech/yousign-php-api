<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowTemplate implements AdditionalPropertiesInterface
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
     * Unique identifier of the Workflow Template.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Name of the Workflow Template.
     *
     * @var string|null
     */
    protected $name;
    /**
     * List of the Action Groups contained in the Workflow Template. The Action Groups will determine what Actions the end users will have to go through to complete the Workflow Session.
     *
     * @var list<WorkflowTemplateActionGroupsInner>|null
     */
    protected $actionGroups;
    /**
     * List of Workspaces that define where the Workflow Template is scoped. The scoping determines which Workspace a Workflow Session created from this Template will belong to. Behavior varies depending on whether the Template is scoped to one, multiple, or no Workspaces.
     *
     * @var list<WorkflowTemplateWorkspacesInner>|null
     */
    protected $workspaces;

    /**
     * Unique identifier of the Workflow Template.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Workflow Template.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the Workflow Template.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Workflow Template.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * List of the Action Groups contained in the Workflow Template. The Action Groups will determine what Actions the end users will have to go through to complete the Workflow Session.
     *
     * @return list<WorkflowTemplateActionGroupsInner>|null
     */
    public function getActionGroups(): ?array
    {
        return $this->actionGroups;
    }

    /**
     * List of the Action Groups contained in the Workflow Template. The Action Groups will determine what Actions the end users will have to go through to complete the Workflow Session.
     *
     * @param list<WorkflowTemplateActionGroupsInner>|null $actionGroups
     */
    public function setActionGroups(?array $actionGroups): self
    {
        $this->initialized['actionGroups'] = true;
        $this->actionGroups = $actionGroups;

        return $this;
    }

    /**
     * List of Workspaces that define where the Workflow Template is scoped. The scoping determines which Workspace a Workflow Session created from this Template will belong to. Behavior varies depending on whether the Template is scoped to one, multiple, or no Workspaces.
     *
     * @return list<WorkflowTemplateWorkspacesInner>|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * List of Workspaces that define where the Workflow Template is scoped. The scoping determines which Workspace a Workflow Session created from this Template will belong to. Behavior varies depending on whether the Template is scoped to one, multiple, or no Workspaces.
     *
     * @param list<WorkflowTemplateWorkspacesInner>|null $workspaces
     */
    public function setWorkspaces(?array $workspaces): self
    {
        $this->initialized['workspaces'] = true;
        $this->workspaces = $workspaces;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'name' => ['name', 'getName', 'setName'], 'actionGroups' => ['action_groups', 'getActionGroups', 'setActionGroups'], 'workspaces' => ['workspaces', 'getWorkspaces', 'setWorkspaces']];
    }
}
