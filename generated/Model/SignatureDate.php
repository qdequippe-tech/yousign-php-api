<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureDate implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $signerId;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var int|null
     */
    protected $page;
    /**
     * @var int|null
     */
    protected $x;
    /**
     * @var int|null
     */
    protected $y;
    /**
     * Font configuration (family, size, color, style variants).
     *
     * @var CreateSignatureDateFieldFont|null
     */
    protected $font;
    /**
     * Name of the Field.
     *
     * @var string|null
     */
    protected $name;
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
     * Unit of time used to offset the signature date. When `null`, the field will display the exact signature date.
     *
     * @var string|null
     */
    protected $offsetUnit = 'days';
    /**
     * Number of units to add to the signature date. Ignored if `offset_unit` is `null`. For example, use `offset_unit`: `"month"` and `offset_value: 3` to display "signature date + 3 months".
     *
     * @var int|null
     */
    protected $offsetValue = 0;

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(?int $x): self
    {
        $this->initialized['x'] = true;
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }

    /**
     * Font configuration (family, size, color, style variants).
     */
    public function getFont(): ?CreateSignatureDateFieldFont
    {
        return $this->font;
    }

    /**
     * Font configuration (family, size, color, style variants).
     */
    public function setFont(?CreateSignatureDateFieldFont $font): self
    {
        $this->initialized['font'] = true;
        $this->font = $font;

        return $this;
    }

    /**
     * Name of the Field.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Field.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

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

    /**
     * Unit of time used to offset the signature date. When `null`, the field will display the exact signature date.
     */
    public function getOffsetUnit(): ?string
    {
        return $this->offsetUnit;
    }

    /**
     * Unit of time used to offset the signature date. When `null`, the field will display the exact signature date.
     */
    public function setOffsetUnit(?string $offsetUnit): self
    {
        $this->initialized['offsetUnit'] = true;
        $this->offsetUnit = $offsetUnit;

        return $this;
    }

    /**
     * Number of units to add to the signature date. Ignored if `offset_unit` is `null`. For example, use `offset_unit`: `"month"` and `offset_value: 3` to display "signature date + 3 months".
     */
    public function getOffsetValue(): ?int
    {
        return $this->offsetValue;
    }

    /**
     * Number of units to add to the signature date. Ignored if `offset_unit` is `null`. For example, use `offset_unit`: `"month"` and `offset_value: 3` to display "signature date + 3 months".
     */
    public function setOffsetValue(?int $offsetValue): self
    {
        $this->initialized['offsetValue'] = true;
        $this->offsetValue = $offsetValue;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'font' => ['font', 'getFont', 'setFont'], 'name' => ['name', 'getName', 'setName'], 'dateFormat' => ['date_format', 'getDateFormat', 'setDateFormat'], 'timeFormat' => ['time_format', 'getTimeFormat', 'setTimeFormat'], 'showTimezone' => ['show_timezone', 'getShowTimezone', 'setShowTimezone'], 'showEmail' => ['show_email', 'getShowEmail', 'setShowEmail'], 'offsetUnit' => ['offset_unit', 'getOffsetUnit', 'setOffsetUnit'], 'offsetValue' => ['offset_value', 'getOffsetValue', 'setOffsetValue']];
    }
}
