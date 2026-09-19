<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ElectronicSealsConsumption implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $sealId;
    /**
     * @var string|null
     */
    protected $documentId;
    /**
     * Level of the Electronic Seal applied.
     *
     * @var string|null
     */
    protected $sealLevel;
    /**
     * Creation time of the record.
     *
     * @var string|null
     */
    protected $createdAt;
    /**
     * Origin of the operation.
     *
     * @var string|null
     */
    protected $source;
    /**
     * Optional user-defined identifier.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * @var string|null
     */
    protected $certificateId;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Identifier of the key used for the operation.
     *
     * @var string|null
     */
    protected $authenticationKey;
    /**
     * Name of the workspace.
     *
     * @var string|null
     */
    protected $workspaceName;
    /**
     * External name of the workspace.
     *
     * @var string|null
     */
    protected $workspaceExternalName;

    public function getSealId(): ?string
    {
        return $this->sealId;
    }

    public function setSealId(?string $sealId): self
    {
        $this->initialized['sealId'] = true;
        $this->sealId = $sealId;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Level of the Electronic Seal applied.
     */
    public function getSealLevel(): ?string
    {
        return $this->sealLevel;
    }

    /**
     * Level of the Electronic Seal applied.
     */
    public function setSealLevel(?string $sealLevel): self
    {
        $this->initialized['sealLevel'] = true;
        $this->sealLevel = $sealLevel;

        return $this;
    }

    /**
     * Creation time of the record.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Creation time of the record.
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Origin of the operation.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Origin of the operation.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * Optional user-defined identifier.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Optional user-defined identifier.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

        return $this;
    }

    public function getCertificateId(): ?string
    {
        return $this->certificateId;
    }

    public function setCertificateId(?string $certificateId): self
    {
        $this->initialized['certificateId'] = true;
        $this->certificateId = $certificateId;

        return $this;
    }

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Identifier of the key used for the operation.
     */
    public function getAuthenticationKey(): ?string
    {
        return $this->authenticationKey;
    }

    /**
     * Identifier of the key used for the operation.
     */
    public function setAuthenticationKey(?string $authenticationKey): self
    {
        $this->initialized['authenticationKey'] = true;
        $this->authenticationKey = $authenticationKey;

        return $this;
    }

    /**
     * Name of the workspace.
     */
    public function getWorkspaceName(): ?string
    {
        return $this->workspaceName;
    }

    /**
     * Name of the workspace.
     */
    public function setWorkspaceName(?string $workspaceName): self
    {
        $this->initialized['workspaceName'] = true;
        $this->workspaceName = $workspaceName;

        return $this;
    }

    /**
     * External name of the workspace.
     */
    public function getWorkspaceExternalName(): ?string
    {
        return $this->workspaceExternalName;
    }

    /**
     * External name of the workspace.
     */
    public function setWorkspaceExternalName(?string $workspaceExternalName): self
    {
        $this->initialized['workspaceExternalName'] = true;
        $this->workspaceExternalName = $workspaceExternalName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['sealId' => ['seal_id', 'getSealId', 'setSealId'], 'documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'sealLevel' => ['seal_level', 'getSealLevel', 'setSealLevel'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'source' => ['source', 'getSource', 'setSource'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'certificateId' => ['certificate_id', 'getCertificateId', 'setCertificateId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'authenticationKey' => ['authentication_key', 'getAuthenticationKey', 'setAuthenticationKey'], 'workspaceName' => ['workspace_name', 'getWorkspaceName', 'setWorkspaceName'], 'workspaceExternalName' => ['workspace_external_name', 'getWorkspaceExternalName', 'setWorkspaceExternalName']];
    }
}
