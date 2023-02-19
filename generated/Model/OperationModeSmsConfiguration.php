<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class OperationModeSmsConfiguration
{
    /**
     * Content of your custom sms message. Should contains the substring `{{code}}`.
     *
     * @var string|null
     */
    protected $content;

    /**
     * Content of your custom sms message. Should contains the substring `{{code}}`.
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Content of your custom sms message. Should contains the substring `{{code}}`.
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
