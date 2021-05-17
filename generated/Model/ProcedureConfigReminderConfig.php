<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureConfigReminderConfig
{
    /**
     * @var ProcedureConfigReminderConfigEmail|null
     */
    protected $email;

    public function getEmail(): ?ProcedureConfigReminderConfigEmail
    {
        return $this->email;
    }

    public function setEmail(?ProcedureConfigReminderConfigEmail $email): self
    {
        $this->email = $email;

        return $this;
    }
}
