<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InvitedSignersConsumption implements AdditionalPropertiesInterface
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
     * Creation time of the record.
     *
     * @var string|null
     */
    protected $createdAt;
    /**
     * @var string|null
     */
    protected $signerId;
    /**
     * @var string|null
     */
    protected $signerEmail;
    /**
     * @var string|null
     */
    protected $signatureRequestId;
    /**
     * @var string|null
     */
    protected $signatureRequestName;
    /**
     * Level of the Signature Request.
     *
     * @var string|null
     */
    protected $signatureLevel;
    /**
     * @var string|null
     */
    protected $senderId;
    /**
     * @var string|null
     */
    protected $senderEmail;
    /**
     * Origin of the operation.
     *
     * @var string|null
     */
    protected $source;
    /**
     * Signature request origin.
     *
     * @var string|null
     */
    protected $connector;
    /**
     * Identifier of the key used for the operation.
     *
     * @var string|null
     */
    protected $authenticationKey;
    /**
     * Description of the key used for the operation.
     *
     * @var string|null
     */
    protected $authenticationKeyDescription;
    /**
     * Optional user-defined identifier.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Name of the workspace.
     *
     * @var string|null
     */
    protected $workspaceName;
    /**
     * Full name of the signer.
     *
     * @var string|null
     */
    protected $signerFullname;
    /**
     * External name of the workspace.
     *
     * @var string|null
     */
    protected $workspaceExternalName;

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

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

        return $this;
    }

    public function getSignerEmail(): ?string
    {
        return $this->signerEmail;
    }

    public function setSignerEmail(?string $signerEmail): self
    {
        $this->initialized['signerEmail'] = true;
        $this->signerEmail = $signerEmail;

        return $this;
    }

    public function getSignatureRequestId(): ?string
    {
        return $this->signatureRequestId;
    }

    public function setSignatureRequestId(?string $signatureRequestId): self
    {
        $this->initialized['signatureRequestId'] = true;
        $this->signatureRequestId = $signatureRequestId;

        return $this;
    }

    public function getSignatureRequestName(): ?string
    {
        return $this->signatureRequestName;
    }

    public function setSignatureRequestName(?string $signatureRequestName): self
    {
        $this->initialized['signatureRequestName'] = true;
        $this->signatureRequestName = $signatureRequestName;

        return $this;
    }

    /**
     * Level of the Signature Request.
     */
    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    /**
     * Level of the Signature Request.
     */
    public function setSignatureLevel(?string $signatureLevel): self
    {
        $this->initialized['signatureLevel'] = true;
        $this->signatureLevel = $signatureLevel;

        return $this;
    }

    public function getSenderId(): ?string
    {
        return $this->senderId;
    }

    public function setSenderId(?string $senderId): self
    {
        $this->initialized['senderId'] = true;
        $this->senderId = $senderId;

        return $this;
    }

    public function getSenderEmail(): ?string
    {
        return $this->senderEmail;
    }

    public function setSenderEmail(?string $senderEmail): self
    {
        $this->initialized['senderEmail'] = true;
        $this->senderEmail = $senderEmail;

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
     * Signature request origin.
     */
    public function getConnector(): ?string
    {
        return $this->connector;
    }

    /**
     * Signature request origin.
     */
    public function setConnector(?string $connector): self
    {
        $this->initialized['connector'] = true;
        $this->connector = $connector;

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
     * Description of the key used for the operation.
     */
    public function getAuthenticationKeyDescription(): ?string
    {
        return $this->authenticationKeyDescription;
    }

    /**
     * Description of the key used for the operation.
     */
    public function setAuthenticationKeyDescription(?string $authenticationKeyDescription): self
    {
        $this->initialized['authenticationKeyDescription'] = true;
        $this->authenticationKeyDescription = $authenticationKeyDescription;

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
     * Full name of the signer.
     */
    public function getSignerFullname(): ?string
    {
        return $this->signerFullname;
    }

    /**
     * Full name of the signer.
     */
    public function setSignerFullname(?string $signerFullname): self
    {
        $this->initialized['signerFullname'] = true;
        $this->signerFullname = $signerFullname;

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
        return ['createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'signerEmail' => ['signer_email', 'getSignerEmail', 'setSignerEmail'], 'signatureRequestId' => ['signature_request_id', 'getSignatureRequestId', 'setSignatureRequestId'], 'signatureRequestName' => ['signature_request_name', 'getSignatureRequestName', 'setSignatureRequestName'], 'signatureLevel' => ['signature_level', 'getSignatureLevel', 'setSignatureLevel'], 'senderId' => ['sender_id', 'getSenderId', 'setSenderId'], 'senderEmail' => ['sender_email', 'getSenderEmail', 'setSenderEmail'], 'source' => ['source', 'getSource', 'setSource'], 'connector' => ['connector', 'getConnector', 'setConnector'], 'authenticationKey' => ['authentication_key', 'getAuthenticationKey', 'setAuthenticationKey'], 'authenticationKeyDescription' => ['authentication_key_description', 'getAuthenticationKeyDescription', 'setAuthenticationKeyDescription'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'workspaceName' => ['workspace_name', 'getWorkspaceName', 'setWorkspaceName'], 'signerFullname' => ['signer_fullname', 'getSignerFullname', 'setSignerFullname'], 'workspaceExternalName' => ['workspace_external_name', 'getWorkspaceExternalName', 'setWorkspaceExternalName']];
    }
}
