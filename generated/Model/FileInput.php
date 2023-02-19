<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class FileInput
{
    /**
     * Name of the file.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Type of the file.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Password for protected PDF file.
     *
     * @var string|null
     */
    protected $password;
    /**
     * Description of the file.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Metadata of the file.
     *
     * @var FileInputMetadata|null
     */
    protected $metadata;
    /**
     * Content in base 64 of the file.
     *
     * @var string|null
     */
    protected $content;
    /**
     * Id of the procedure.
     *
     * @var string|null
     */
    protected $procedure;
    /**
     * @var int|null
     */
    protected $position = 0;

    /**
     * Name of the file.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the file.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Type of the file.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the file.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Password for protected PDF file.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Password for protected PDF file.
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Description of the file.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description of the file.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Metadata of the file.
     */
    public function getMetadata(): ?FileInputMetadata
    {
        return $this->metadata;
    }

    /**
     * Metadata of the file.
     */
    public function setMetadata(?FileInputMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Content in base 64 of the file.
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Content in base 64 of the file.
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Id of the procedure.
     */
    public function getProcedure(): ?string
    {
        return $this->procedure;
    }

    /**
     * Id of the procedure.
     */
    public function setProcedure(?string $procedure): self
    {
        $this->procedure = $procedure;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }
}
