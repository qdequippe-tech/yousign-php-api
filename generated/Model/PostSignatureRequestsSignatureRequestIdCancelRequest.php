<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class PostSignatureRequestsSignatureRequestIdCancelRequest implements AdditionalPropertiesInterface
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
     * Reason for cancelling the Signature Request.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Free-text note detailing the cancellation reason.
     *
     * @var string|null
     */
    protected $customNote;

    /**
     * Reason for cancelling the Signature Request.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Reason for cancelling the Signature Request.
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    /**
     * Free-text note detailing the cancellation reason.
     */
    public function getCustomNote(): ?string
    {
        return $this->customNote;
    }

    /**
     * Free-text note detailing the cancellation reason.
     */
    public function setCustomNote(?string $customNote): self
    {
        $this->initialized['customNote'] = true;
        $this->customNote = $customNote;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['reason' => ['reason', 'getReason', 'setReason'], 'customNote' => ['custom_note', 'getCustomNote', 'setCustomNote']];
    }
}
