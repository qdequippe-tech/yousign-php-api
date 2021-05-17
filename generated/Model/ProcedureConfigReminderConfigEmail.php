<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureConfigReminderConfigEmail
{
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $reminderExecuted;

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getReminderExecuted(): ?array
    {
        return $this->reminderExecuted;
    }

    /**
     * @param ConfigEmailTemplate[]|null $reminderExecuted
     */
    public function setReminderExecuted(?array $reminderExecuted): self
    {
        $this->reminderExecuted = $reminderExecuted;

        return $this;
    }
}
