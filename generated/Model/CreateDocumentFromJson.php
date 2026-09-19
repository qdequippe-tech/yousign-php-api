<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateDocumentFromJson implements AdditionalPropertiesInterface
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
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     *
     * @var string|null
     */
    protected $electronicSealDocumentId;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $nature;
    /**
     * Insert just after the position of the specified Document id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     *
     * @var bool|null
     */
    protected $parseAnchors = false;
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
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     */
    public function getElectronicSealDocumentId(): ?string
    {
        return $this->electronicSealDocumentId;
    }

    /**
     * Id of the Electronic Seal Document. The Electronic Seal must be done to use its Electronic Seal Document.
     */
    public function setElectronicSealDocumentId(?string $electronicSealDocumentId): self
    {
        $this->initialized['electronicSealDocumentId'] = true;
        $this->electronicSealDocumentId = $electronicSealDocumentId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    /**
     * Insert just after the position of the specified Document id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified Document id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     */
    public function getParseAnchors(): ?bool
    {
        return $this->parseAnchors;
    }

    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     */
    public function setParseAnchors(?bool $parseAnchors): self
    {
        $this->initialized['parseAnchors'] = true;
        $this->parseAnchors = $parseAnchors;

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
        return ['electronicSealDocumentId' => ['electronic_seal_document_id', 'getElectronicSealDocumentId', 'setElectronicSealDocumentId'], 'name' => ['name', 'getName', 'setName'], 'nature' => ['nature', 'getNature', 'setNature'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'parseAnchors' => ['parse_anchors', 'getParseAnchors', 'setParseAnchors'], 'excludedApprovers' => ['excluded_approvers', 'getExcludedApprovers', 'setExcludedApprovers'], 'excludedSigners' => ['excluded_signers', 'getExcludedSigners', 'setExcludedSigners']];
    }
}
