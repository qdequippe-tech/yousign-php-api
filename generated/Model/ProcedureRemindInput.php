<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureRemindInput
{
    /**
     * @var ProcedureRemindConfig|null
     */
    protected $config;

    public function getConfig(): ?ProcedureRemindConfig
    {
        return $this->config;
    }

    public function setConfig(?ProcedureRemindConfig $config): self
    {
        $this->config = $config;

        return $this;
    }
}
