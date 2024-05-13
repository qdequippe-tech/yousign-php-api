<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestEmailNotificationSender extends \ArrayObject
{
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
    protected $type;
    /**
     * @var string|null
     */
    protected $customName;

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

    public function getCustomName(): ?string
    {
        return $this->customName;
    }

    public function setCustomName(?string $customName): self
    {
        $this->initialized['customName'] = true;
        $this->customName = $customName;

        return $this;
    }
}
