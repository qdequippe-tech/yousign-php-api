<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureConfig
{
    /**
     * @var ProcedureConfigEmail|null
     */
    protected $email;
    /**
     * @var ProcedureConfigReminder[]|null
     */
    protected $reminders;
    /**
     * @var ProcedureConfigWebhook|null
     */
    protected $webhook;

    public function getEmail(): ?ProcedureConfigEmail
    {
        return $this->email;
    }

    public function setEmail(?ProcedureConfigEmail $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return ProcedureConfigReminder[]|null
     */
    public function getReminders(): ?array
    {
        return $this->reminders;
    }

    /**
     * @param ProcedureConfigReminder[]|null $reminders
     */
    public function setReminders(?array $reminders): self
    {
        $this->reminders = $reminders;

        return $this;
    }

    public function getWebhook(): ?ProcedureConfigWebhook
    {
        return $this->webhook;
    }

    public function setWebhook(?ProcedureConfigWebhook $webhook): self
    {
        $this->webhook = $webhook;

        return $this;
    }
}
