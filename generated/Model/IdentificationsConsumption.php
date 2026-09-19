<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class IdentificationsConsumption implements AdditionalPropertiesInterface
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
     * Identification of the Signer.
     *
     * @var string|null
     */
    protected $signerIdentification;
    /**
     * Identification time of the signer.
     *
     * @var string|null
     */
    protected $identifiedAt;
    /**
     * Status of the identification.
     *
     * @var string|null
     */
    protected $identificationStatus;
    /**
     * @var list<string>|null
     */
    protected $identificationReasons;
    /**
     * @var string|null
     */
    protected $senderId;
    /**
     * @var string|null
     */
    protected $senderEmail;
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

    /**
     * Identification of the Signer.
     */
    public function getSignerIdentification(): ?string
    {
        return $this->signerIdentification;
    }

    /**
     * Identification of the Signer.
     */
    public function setSignerIdentification(?string $signerIdentification): self
    {
        $this->initialized['signerIdentification'] = true;
        $this->signerIdentification = $signerIdentification;

        return $this;
    }

    /**
     * Identification time of the signer.
     */
    public function getIdentifiedAt(): ?string
    {
        return $this->identifiedAt;
    }

    /**
     * Identification time of the signer.
     */
    public function setIdentifiedAt(?string $identifiedAt): self
    {
        $this->initialized['identifiedAt'] = true;
        $this->identifiedAt = $identifiedAt;

        return $this;
    }

    /**
     * Status of the identification.
     */
    public function getIdentificationStatus(): ?string
    {
        return $this->identificationStatus;
    }

    /**
     * Status of the identification.
     */
    public function setIdentificationStatus(?string $identificationStatus): self
    {
        $this->initialized['identificationStatus'] = true;
        $this->identificationStatus = $identificationStatus;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getIdentificationReasons(): ?array
    {
        return $this->identificationReasons;
    }

    /**
     * @param list<string>|null $identificationReasons
     */
    public function setIdentificationReasons(?array $identificationReasons): self
    {
        $this->initialized['identificationReasons'] = true;
        $this->identificationReasons = $identificationReasons;

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
        return ['createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'signerEmail' => ['signer_email', 'getSignerEmail', 'setSignerEmail'], 'signatureRequestId' => ['signature_request_id', 'getSignatureRequestId', 'setSignatureRequestId'], 'signatureRequestName' => ['signature_request_name', 'getSignatureRequestName', 'setSignatureRequestName'], 'signatureLevel' => ['signature_level', 'getSignatureLevel', 'setSignatureLevel'], 'signerIdentification' => ['signer_identification', 'getSignerIdentification', 'setSignerIdentification'], 'identifiedAt' => ['identified_at', 'getIdentifiedAt', 'setIdentifiedAt'], 'identificationStatus' => ['identification_status', 'getIdentificationStatus', 'setIdentificationStatus'], 'identificationReasons' => ['identification_reasons', 'getIdentificationReasons', 'setIdentificationReasons'], 'senderId' => ['sender_id', 'getSenderId', 'setSenderId'], 'senderEmail' => ['sender_email', 'getSenderEmail', 'setSenderEmail'], 'authenticationKey' => ['authentication_key', 'getAuthenticationKey', 'setAuthenticationKey'], 'authenticationKeyDescription' => ['authentication_key_description', 'getAuthenticationKeyDescription', 'setAuthenticationKeyDescription'], 'externalId' => ['external_id', 'getExternalId', 'setExternalId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'workspaceName' => ['workspace_name', 'getWorkspaceName', 'setWorkspaceName'], 'signerFullname' => ['signer_fullname', 'getSignerFullname', 'setSignerFullname'], 'workspaceExternalName' => ['workspace_external_name', 'getWorkspaceExternalName', 'setWorkspaceExternalName']];
    }
}
