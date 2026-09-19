<?php

namespace Qdequippe\Yousign\Api\Model;

class NewSignatureRequestFromScratchReminderSettings
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
     * Number of days between two reminders.
     *
     * @var int|null
     */
    protected $intervalInDays;
    /**
     * Maximum number of reminders sent.
     *
     * @var int|null
     */
    protected $maxOccurrences;

    /**
     * Number of days between two reminders.
     */
    public function getIntervalInDays(): ?int
    {
        return $this->intervalInDays;
    }

    /**
     * Number of days between two reminders.
     */
    public function setIntervalInDays(?int $intervalInDays): self
    {
        $this->initialized['intervalInDays'] = true;
        $this->intervalInDays = $intervalInDays;

        return $this;
    }

    /**
     * Maximum number of reminders sent.
     */
    public function getMaxOccurrences(): ?int
    {
        return $this->maxOccurrences;
    }

    /**
     * Maximum number of reminders sent.
     */
    public function setMaxOccurrences(?int $maxOccurrences): self
    {
        $this->initialized['maxOccurrences'] = true;
        $this->maxOccurrences = $maxOccurrences;

        return $this;
    }
}
