<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestSignerFromInfoInputCustomText extends \ArrayObject
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
     * @var string|null
     */
    protected $requestSubject;
    /**
     * @var string|null
     */
    protected $requestBody;
    /**
     * @var string|null
     */
    protected $reminderSubject;
    /**
     * @var string|null
     */
    protected $reminderBody;

    public function getRequestSubject(): ?string
    {
        return $this->requestSubject;
    }

    public function setRequestSubject(?string $requestSubject): self
    {
        $this->initialized['requestSubject'] = true;
        $this->requestSubject = $requestSubject;

        return $this;
    }

    public function getRequestBody(): ?string
    {
        return $this->requestBody;
    }

    public function setRequestBody(?string $requestBody): self
    {
        $this->initialized['requestBody'] = true;
        $this->requestBody = $requestBody;

        return $this;
    }

    public function getReminderSubject(): ?string
    {
        return $this->reminderSubject;
    }

    public function setReminderSubject(?string $reminderSubject): self
    {
        $this->initialized['reminderSubject'] = true;
        $this->reminderSubject = $reminderSubject;

        return $this;
    }

    public function getReminderBody(): ?string
    {
        return $this->reminderBody;
    }

    public function setReminderBody(?string $reminderBody): self
    {
        $this->initialized['reminderBody'] = true;
        $this->reminderBody = $reminderBody;

        return $this;
    }
}
