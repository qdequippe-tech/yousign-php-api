<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureConfigReminder
{
    /**
     * Number of days between each reminder. The date of the creation of the procedure is used to define the date of the reminder. For example, if you set 2 and the procedure is created at 2017-01-01T15:03:01, the first reminder will be sent at 2017-01-03T15:03:01.
     *
     * @var int|null
     */
    protected $interval = 1;
    /**
     * Limit of reminders sent.
     *
     * @var int|null
     */
    protected $limit = 5;
    /**
     * @var ProcedureConfigReminderConfig|null
     */
    protected $config;

    /**
     * Number of days between each reminder. The date of the creation of the procedure is used to define the date of the reminder. For example, if you set 2 and the procedure is created at 2017-01-01T15:03:01, the first reminder will be sent at 2017-01-03T15:03:01.
     */
    public function getInterval(): ?int
    {
        return $this->interval;
    }

    /**
     * Number of days between each reminder. The date of the creation of the procedure is used to define the date of the reminder. For example, if you set 2 and the procedure is created at 2017-01-01T15:03:01, the first reminder will be sent at 2017-01-03T15:03:01.
     */
    public function setInterval(?int $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Limit of reminders sent.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Limit of reminders sent.
     */
    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function getConfig(): ?ProcedureConfigReminderConfig
    {
        return $this->config;
    }

    public function setConfig(?ProcedureConfigReminderConfig $config): self
    {
        $this->config = $config;

        return $this;
    }
}
