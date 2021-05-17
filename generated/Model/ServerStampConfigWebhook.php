<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ServerStampConfigWebhook
{
    /**
     * @var ConfigWebhookTemplate[]|null
     */
    protected $serverStampFinished;

    /**
     * @return ConfigWebhookTemplate[]|null
     */
    public function getServerStampFinished(): ?array
    {
        return $this->serverStampFinished;
    }

    /**
     * @param ConfigWebhookTemplate[]|null $serverStampFinished
     */
    public function setServerStampFinished(?array $serverStampFinished): self
    {
        $this->serverStampFinished = $serverStampFinished;

        return $this;
    }
}
