<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestEmailNotificationSender implements AdditionalPropertiesInterface
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
     * Identity used as the email sender.
     *
     * @var string|null
     */
    protected $type;
    /**
     * To use in association with sender type custom to precise the name.
     *
     * @var string|null
     */
    protected $customName;

    /**
     * Identity used as the email sender.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Identity used as the email sender.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * To use in association with sender type custom to precise the name.
     */
    public function getCustomName(): ?string
    {
        return $this->customName;
    }

    /**
     * To use in association with sender type custom to precise the name.
     */
    public function setCustomName(?string $customName): self
    {
        $this->initialized['customName'] = true;
        $this->customName = $customName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'customName' => ['custom_name', 'getCustomName', 'setCustomName']];
    }
}
