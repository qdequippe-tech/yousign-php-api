<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ConfigEmailTemplate
{
    /**
     * Reference or email of recipients.
     *
     * @var string[]|null
     */
    protected $to;
    /**
     * Subject of the mail.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Object of the mail.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Modify the from name.
     *
     * @var string|null
     */
    protected $fromName = 'Yousign';

    /**
     * Reference or email of recipients.
     *
     * @return string[]|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }

    /**
     * Reference or email of recipients.
     *
     * @param string[]|null $to
     */
    public function setTo(?array $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Subject of the mail.
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * Subject of the mail.
     */
    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Object of the mail.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Object of the mail.
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Modify the from name.
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * Modify the from name.
     */
    public function setFromName(?string $fromName): self
    {
        $this->fromName = $fromName;

        return $this;
    }
}
