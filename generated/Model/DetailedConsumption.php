<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class DetailedConsumption implements AdditionalPropertiesInterface
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
    protected $source;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * Specifies the level of the consumed eSignature, eSeal and QES identification attempts: simple, advanced, or qualified.
     * Only set when type is either `invited_signer`, `electronic_seals`, `identification_attempts`.
     *
     * @var string|null
     */
    protected $level;
    /**
     * @var string|null
     */
    protected $verificationType;
    /**
     * Only set if type is identification_attempts.
     *
     * @var string|null
     */
    protected $identificationMode;
    /**
     * Only set if breakdown is set on workspaces.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Count of items or file size in case of archiving.
     *
     * @var int|null
     */
    protected $value;

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Specifies the level of the consumed eSignature, eSeal and QES identification attempts: simple, advanced, or qualified.
     * Only set when type is either `invited_signer`, `electronic_seals`, `identification_attempts`.
     */
    public function getLevel(): ?string
    {
        return $this->level;
    }

    /**
     * Specifies the level of the consumed eSignature, eSeal and QES identification attempts: simple, advanced, or qualified.
     * Only set when type is either `invited_signer`, `electronic_seals`, `identification_attempts`.
     */
    public function setLevel(?string $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }

    public function getVerificationType(): ?string
    {
        return $this->verificationType;
    }

    public function setVerificationType(?string $verificationType): self
    {
        $this->initialized['verificationType'] = true;
        $this->verificationType = $verificationType;

        return $this;
    }

    /**
     * Only set if type is identification_attempts.
     */
    public function getIdentificationMode(): ?string
    {
        return $this->identificationMode;
    }

    /**
     * Only set if type is identification_attempts.
     */
    public function setIdentificationMode(?string $identificationMode): self
    {
        $this->initialized['identificationMode'] = true;
        $this->identificationMode = $identificationMode;

        return $this;
    }

    /**
     * Only set if breakdown is set on workspaces.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Only set if breakdown is set on workspaces.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Count of items or file size in case of archiving.
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * Count of items or file size in case of archiving.
     */
    public function setValue(?int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['source' => ['source', 'getSource', 'setSource'], 'type' => ['type', 'getType', 'setType'], 'level' => ['level', 'getLevel', 'setLevel'], 'verificationType' => ['verification_type', 'getVerificationType', 'setVerificationType'], 'identificationMode' => ['identification_mode', 'getIdentificationMode', 'setIdentificationMode'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'value' => ['value', 'getValue', 'setValue']];
    }
}
