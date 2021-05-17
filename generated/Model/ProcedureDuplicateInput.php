<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureDuplicateInput
{
    /**
     * Defines if the new procedure should be started after the duplication.
     *
     * @var bool|null
     */
    protected $start = false;
    /**
     * Override the parent value for this property and defines if the new procedure should be a template or not.
     *
     * @var bool|null
     */
    protected $template;

    /**
     * Defines if the new procedure should be started after the duplication.
     */
    public function getStart(): ?bool
    {
        return $this->start;
    }

    /**
     * Defines if the new procedure should be started after the duplication.
     */
    public function setStart(?bool $start): self
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Override the parent value for this property and defines if the new procedure should be a template or not.
     */
    public function getTemplate(): ?bool
    {
        return $this->template;
    }

    /**
     * Override the parent value for this property and defines if the new procedure should be a template or not.
     */
    public function setTemplate(?bool $template): self
    {
        $this->template = $template;

        return $this;
    }
}
