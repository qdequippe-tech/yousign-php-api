<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowSessionActionGroupsInner implements AdditionalPropertiesInterface
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
     * Type of the Action Group.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Status of the Action Group.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Actions represent the resources associated with this Workflow Session, such as a Signature Request, Identity Document Verification, or other types of verifications. Actions of the same type are gathered in the same Action Group.
     *
     * @var list<WorkflowSessionActionGroupsInnerActionsInner>|null
     */
    protected $actions;

    /**
     * Type of the Action Group.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the Action Group.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Status of the Action Group.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Action Group.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Actions represent the resources associated with this Workflow Session, such as a Signature Request, Identity Document Verification, or other types of verifications. Actions of the same type are gathered in the same Action Group.
     *
     * @return list<WorkflowSessionActionGroupsInnerActionsInner>|null
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * Actions represent the resources associated with this Workflow Session, such as a Signature Request, Identity Document Verification, or other types of verifications. Actions of the same type are gathered in the same Action Group.
     *
     * @param list<WorkflowSessionActionGroupsInnerActionsInner>|null $actions
     */
    public function setActions(?array $actions): self
    {
        $this->initialized['actions'] = true;
        $this->actions = $actions;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'status' => ['status', 'getStatus', 'setStatus'], 'actions' => ['actions', 'getActions', 'setActions']];
    }
}
