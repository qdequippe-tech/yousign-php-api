<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class UserOutputNotifications
{
    /**
     * @var bool|null
     */
    protected $procedure;

    public function getProcedure(): ?bool
    {
        return $this->procedure;
    }

    public function setProcedure(?bool $procedure): self
    {
        $this->procedure = $procedure;

        return $this;
    }
}
