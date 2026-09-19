<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureDisplayOneOf1Options implements AdditionalPropertiesInterface
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
     * Format used to display the date (e.g., `dd/MM/yyyy`, `MM/dd/yyyy`).
     *
     * @var string|null
     */
    protected $dateFormat = 'dd/MM/yyyy';
    /**
     * Format used to display the time. Can be null to display only the date, or a format like `HH:mm` or `hh:mm a`.
     *
     * @var string|null
     */
    protected $timeFormat;
    /**
     * Boolean indicating whether to display the timezone abbreviation (e.g., `CEST`) next to the time.
     *
     * @var bool|null
     */
    protected $showTimezone = false;
    /**
     * Boolean indicating whether to display the signer's email address.
     *
     * @var bool|null
     */
    protected $showEmail = true;

    /**
     * Format used to display the date (e.g., `dd/MM/yyyy`, `MM/dd/yyyy`).
     */
    public function getDateFormat(): ?string
    {
        return $this->dateFormat;
    }

    /**
     * Format used to display the date (e.g., `dd/MM/yyyy`, `MM/dd/yyyy`).
     */
    public function setDateFormat(?string $dateFormat): self
    {
        $this->initialized['dateFormat'] = true;
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * Format used to display the time. Can be null to display only the date, or a format like `HH:mm` or `hh:mm a`.
     */
    public function getTimeFormat(): ?string
    {
        return $this->timeFormat;
    }

    /**
     * Format used to display the time. Can be null to display only the date, or a format like `HH:mm` or `hh:mm a`.
     */
    public function setTimeFormat(?string $timeFormat): self
    {
        $this->initialized['timeFormat'] = true;
        $this->timeFormat = $timeFormat;

        return $this;
    }

    /**
     * Boolean indicating whether to display the timezone abbreviation (e.g., `CEST`) next to the time.
     */
    public function getShowTimezone(): ?bool
    {
        return $this->showTimezone;
    }

    /**
     * Boolean indicating whether to display the timezone abbreviation (e.g., `CEST`) next to the time.
     */
    public function setShowTimezone(?bool $showTimezone): self
    {
        $this->initialized['showTimezone'] = true;
        $this->showTimezone = $showTimezone;

        return $this;
    }

    /**
     * Boolean indicating whether to display the signer's email address.
     */
    public function getShowEmail(): ?bool
    {
        return $this->showEmail;
    }

    /**
     * Boolean indicating whether to display the signer's email address.
     */
    public function setShowEmail(?bool $showEmail): self
    {
        $this->initialized['showEmail'] = true;
        $this->showEmail = $showEmail;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['dateFormat' => ['date_format', 'getDateFormat', 'setDateFormat'], 'timeFormat' => ['time_format', 'getTimeFormat', 'setTimeFormat'], 'showTimezone' => ['show_timezone', 'getShowTimezone', 'setShowTimezone'], 'showEmail' => ['show_email', 'getShowEmail', 'setShowEmail']];
    }
}
