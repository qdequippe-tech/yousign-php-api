<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureRemindConfig
{
    /**
     * @var ProcedureRemindConfigEmail|null
     */
    protected $email;

    public function getEmail(): ?ProcedureRemindConfigEmail
    {
        return $this->email;
    }

    public function setEmail(?ProcedureRemindConfigEmail $email): self
    {
        $this->email = $email;

        return $this;
    }
}
