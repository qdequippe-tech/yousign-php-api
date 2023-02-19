<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ConsentProcessOutput
{
    /**
     * Id of object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Type of operation.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Description of consent Process.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Consent process is required.
     *
     * @var bool|null
     */
    protected $required = true;
    /**
     * Position of consent process.
     *
     * @var int|null
     */
    protected $position;
    /**
     * Expected value for consent process value.
     *
     * @var string|null
     */
    protected $expectedValue;
    /**
     * List of members attached to consent process.
     *
     * @var string[]|null
     */
    protected $members;
    /**
     * File attached to consent process.
     *
     * @var string|null
     */
    protected $file;

    /**
     * Id of object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Type of operation.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of operation.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Description of consent Process.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description of consent Process.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Consent process is required.
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * Consent process is required.
     */
    public function setRequired(?bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Position of consent process.
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * Position of consent process.
     */
    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Expected value for consent process value.
     */
    public function getExpectedValue(): ?string
    {
        return $this->expectedValue;
    }

    /**
     * Expected value for consent process value.
     */
    public function setExpectedValue(?string $expectedValue): self
    {
        $this->expectedValue = $expectedValue;

        return $this;
    }

    /**
     * List of members attached to consent process.
     *
     * @return string[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * List of members attached to consent process.
     *
     * @param string[]|null $members
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;

        return $this;
    }

    /**
     * File attached to consent process.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * File attached to consent process.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }
}
