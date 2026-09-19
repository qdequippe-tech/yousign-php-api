<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NaturalPersonMonitoringFull implements AdditionalPropertiesInterface
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
     * Unique identifier of the Natural Person Ongoing Monitoring.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Unique identifier of the Workspace the Natural Person Ongoing Monitoring belongs to.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Date and time at which the Natural Person Ongoing Monitoring was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date and time at which the Natural Person Ongoing Monitoring was last updated.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Current status of the Natural Person Ongoing Monitoring.
     * `pending`: the Ongoing Monitoring has been created and is not watching yet. Activation is asynchronous; the `monitoring.natural_person.activated` webhook event signals that it started watching.
     * `active`: the Ongoing Monitoring is watching the person; any change will be reported.
     * `inconclusive`: the Ongoing Monitoring could not be started and will report no change. See `status_codes` for the reason. This status is final, so initiate a new Ongoing Monitoring to try again.
     * `canceled`: the Ongoing Monitoring has been stopped and will emit no further event.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Codes explaining why the Natural Person Ongoing Monitoring reached its current status. Empty unless the status is `inconclusive`.
     *
     * @var list<string>|null
     */
    protected $statusCodes;
    /**
     * First name of the watched natural person, as provided at creation.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the watched natural person, as provided at creation.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Date of birth of the watched natural person, as provided at creation.
     *
     * @var \DateTime|null
     */
    protected $bornOn;

    /**
     * Unique identifier of the Natural Person Ongoing Monitoring.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Natural Person Ongoing Monitoring.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Unique identifier of the Workspace the Natural Person Ongoing Monitoring belongs to.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Unique identifier of the Workspace the Natural Person Ongoing Monitoring belongs to.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Date and time at which the Natural Person Ongoing Monitoring was created.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date and time at which the Natural Person Ongoing Monitoring was created.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date and time at which the Natural Person Ongoing Monitoring was last updated.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date and time at which the Natural Person Ongoing Monitoring was last updated.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Current status of the Natural Person Ongoing Monitoring.
     * `pending`: the Ongoing Monitoring has been created and is not watching yet. Activation is asynchronous; the `monitoring.natural_person.activated` webhook event signals that it started watching.
     * `active`: the Ongoing Monitoring is watching the person; any change will be reported.
     * `inconclusive`: the Ongoing Monitoring could not be started and will report no change. See `status_codes` for the reason. This status is final, so initiate a new Ongoing Monitoring to try again.
     * `canceled`: the Ongoing Monitoring has been stopped and will emit no further event.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Current status of the Natural Person Ongoing Monitoring.
     * `pending`: the Ongoing Monitoring has been created and is not watching yet. Activation is asynchronous; the `monitoring.natural_person.activated` webhook event signals that it started watching.
     * `active`: the Ongoing Monitoring is watching the person; any change will be reported.
     * `inconclusive`: the Ongoing Monitoring could not be started and will report no change. See `status_codes` for the reason. This status is final, so initiate a new Ongoing Monitoring to try again.
     * `canceled`: the Ongoing Monitoring has been stopped and will emit no further event.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Codes explaining why the Natural Person Ongoing Monitoring reached its current status. Empty unless the status is `inconclusive`.
     *
     * @return list<string>|null
     */
    public function getStatusCodes(): ?array
    {
        return $this->statusCodes;
    }

    /**
     * Codes explaining why the Natural Person Ongoing Monitoring reached its current status. Empty unless the status is `inconclusive`.
     *
     * @param list<string>|null $statusCodes
     */
    public function setStatusCodes(?array $statusCodes): self
    {
        $this->initialized['statusCodes'] = true;
        $this->statusCodes = $statusCodes;

        return $this;
    }

    /**
     * First name of the watched natural person, as provided at creation.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the watched natural person, as provided at creation.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the watched natural person, as provided at creation.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the watched natural person, as provided at creation.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Date of birth of the watched natural person, as provided at creation.
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * Date of birth of the watched natural person, as provided at creation.
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'updatedAt' => ['updated_at', 'getUpdatedAt', 'setUpdatedAt'], 'status' => ['status', 'getStatus', 'setStatus'], 'statusCodes' => ['status_codes', 'getStatusCodes', 'setStatusCodes'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'bornOn' => ['born_on', 'getBornOn', 'setBornOn']];
    }
}
