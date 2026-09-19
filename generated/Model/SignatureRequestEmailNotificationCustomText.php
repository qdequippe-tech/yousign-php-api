<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestEmailNotificationCustomText
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Custom subject of the signature request email.
     *
     * @var string|null
     */
    protected $requestSubject;
    /**
     * Custom body of the signature request email.
     *
     * @var string|null
     */
    protected $requestBody;
    /**
     * Custom subject of reminder emails.
     *
     * @var string|null
     */
    protected $reminderSubject;
    /**
     * Custom body of reminder emails.
     *
     * @var string|null
     */
    protected $reminderBody;

    /**
     * Custom subject of the signature request email.
     */
    public function getRequestSubject(): ?string
    {
        return $this->requestSubject;
    }

    /**
     * Custom subject of the signature request email.
     */
    public function setRequestSubject(?string $requestSubject): self
    {
        $this->initialized['requestSubject'] = true;
        $this->requestSubject = $requestSubject;

        return $this;
    }

    /**
     * Custom body of the signature request email.
     */
    public function getRequestBody(): ?string
    {
        return $this->requestBody;
    }

    /**
     * Custom body of the signature request email.
     */
    public function setRequestBody(?string $requestBody): self
    {
        $this->initialized['requestBody'] = true;
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * Custom subject of reminder emails.
     */
    public function getReminderSubject(): ?string
    {
        return $this->reminderSubject;
    }

    /**
     * Custom subject of reminder emails.
     */
    public function setReminderSubject(?string $reminderSubject): self
    {
        $this->initialized['reminderSubject'] = true;
        $this->reminderSubject = $reminderSubject;

        return $this;
    }

    /**
     * Custom body of reminder emails.
     */
    public function getReminderBody(): ?string
    {
        return $this->reminderBody;
    }

    /**
     * Custom body of reminder emails.
     */
    public function setReminderBody(?string $reminderBody): self
    {
        $this->initialized['reminderBody'] = true;
        $this->reminderBody = $reminderBody;

        return $this;
    }
}
