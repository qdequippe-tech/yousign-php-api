<?php

namespace Qdequippe\Yousign\Api\Model;

class PostSignatureRequestsSignatureRequestIdCancelRequest extends \ArrayObject
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
    protected $reason;
    /**
     * @var string|null
     */
    protected $customNote;

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    public function getCustomNote(): ?string
    {
        return $this->customNote;
    }

    public function setCustomNote(?string $customNote): self
    {
        $this->initialized['customNote'] = true;
        $this->customNote = $customNote;

        return $this;
    }
}
