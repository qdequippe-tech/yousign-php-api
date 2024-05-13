<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignatureRequestReminderSettings extends \ArrayObject
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
     * @var int|null
     */
    protected $intervalInDays;
    /**
     * @var int|null
     */
    protected $maxOccurrences;

    public function getIntervalInDays(): ?int
    {
        return $this->intervalInDays;
    }

    public function setIntervalInDays(?int $intervalInDays): self
    {
        $this->initialized['intervalInDays'] = true;
        $this->intervalInDays = $intervalInDays;

        return $this;
    }

    public function getMaxOccurrences(): ?int
    {
        return $this->maxOccurrences;
    }

    public function setMaxOccurrences(?int $maxOccurrences): self
    {
        $this->initialized['maxOccurrences'] = true;
        $this->maxOccurrences = $maxOccurrences;

        return $this;
    }
}
