<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ServerStampConfig
{
    /**
     * @var ServerStampConfigWebhook|null
     */
    protected $webhook;

    public function getWebhook(): ?ServerStampConfigWebhook
    {
        return $this->webhook;
    }

    public function setWebhook(?ServerStampConfigWebhook $webhook): self
    {
        $this->webhook = $webhook;

        return $this;
    }
}
