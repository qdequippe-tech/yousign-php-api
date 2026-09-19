<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateDocument implements AdditionalPropertiesInterface
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
     * Files in JPEG, JPG, and PNG format can only be of attachment nature.
     *
     * @var string|null
     */
    protected $nature;
    /**
     * Insert just after the position of the specified document id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * The password required to unlock the document if it is protected.
     *
     * @var string|null
     */
    protected $password;
    /**
     * The new name to be assigned to the document. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var array<string, mixed>|null
     */
    protected $initials;
    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @var list<string>|null
     */
    protected $excludedApprovers;
    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @var list<string>|null
     */
    protected $excludedSigners;

    /**
     * Files in JPEG, JPG, and PNG format can only be of attachment nature.
     */
    public function getNature(): ?string
    {
        return $this->nature;
    }

    /**
     * Files in JPEG, JPG, and PNG format can only be of attachment nature.
     */
    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    /**
     * The password required to unlock the document if it is protected.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * The password required to unlock the document if it is protected.
     */
    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    /**
     * The new name to be assigned to the document. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The new name to be assigned to the document. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getInitials(): ?iterable
    {
        return $this->initials;
    }

    /**
     * @param array<string, mixed>|null $initials
     */
    public function setInitials(?iterable $initials): self
    {
        $this->initialized['initials'] = true;
        $this->initials = $initials;

        return $this;
    }

    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedApprovers(): ?array
    {
        return $this->excludedApprovers;
    }

    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @param list<string>|null $excludedApprovers
     */
    public function setExcludedApprovers(?array $excludedApprovers): self
    {
        $this->initialized['excludedApprovers'] = true;
        $this->excludedApprovers = $excludedApprovers;

        return $this;
    }

    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedSigners(): ?array
    {
        return $this->excludedSigners;
    }

    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @param list<string>|null $excludedSigners
     */
    public function setExcludedSigners(?array $excludedSigners): self
    {
        $this->initialized['excludedSigners'] = true;
        $this->excludedSigners = $excludedSigners;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['nature' => ['nature', 'getNature', 'setNature'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'password' => ['password', 'getPassword', 'setPassword'], 'name' => ['name', 'getName', 'setName'], 'initials' => ['initials', 'getInitials', 'setInitials'], 'excludedApprovers' => ['excluded_approvers', 'getExcludedApprovers', 'setExcludedApprovers'], 'excludedSigners' => ['excluded_signers', 'getExcludedSigners', 'setExcludedSigners']];
    }
}
