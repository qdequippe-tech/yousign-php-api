<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NewSignerFromExistingUserCustomText implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     *
     * @var string|null
     */
    protected $requestSubject;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     *
     * @var string|null
     */
    protected $requestBody;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     *
     * @var string|null
     */
    protected $reminderSubject;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     *
     * @var string|null
     */
    protected $reminderBody;

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function getRequestSubject(): ?string
    {
        return $this->requestSubject;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function setRequestSubject(?string $requestSubject): self
    {
        $this->initialized['requestSubject'] = true;
        $this->requestSubject = $requestSubject;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function getRequestBody(): ?string
    {
        return $this->requestBody;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function setRequestBody(?string $requestBody): self
    {
        $this->initialized['requestBody'] = true;
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function getReminderSubject(): ?string
    {
        return $this->reminderSubject;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function setReminderSubject(?string $reminderSubject): self
    {
        $this->initialized['reminderSubject'] = true;
        $this->reminderSubject = $reminderSubject;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function getReminderBody(): ?string
    {
        return $this->reminderBody;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email and leading or trailing whitespaces.
     */
    public function setReminderBody(?string $reminderBody): self
    {
        $this->initialized['reminderBody'] = true;
        $this->reminderBody = $reminderBody;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['requestSubject' => ['request_subject', 'getRequestSubject', 'setRequestSubject'], 'requestBody' => ['request_body', 'getRequestBody', 'setRequestBody'], 'reminderSubject' => ['reminder_subject', 'getReminderSubject', 'setReminderSubject'], 'reminderBody' => ['reminder_body', 'getReminderBody', 'setReminderBody']];
    }
}
