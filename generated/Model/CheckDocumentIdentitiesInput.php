<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class CheckDocumentIdentitiesInput
{
    /**
     * Content in base 64 of the document to check.
     *
     * @var string|null
     */
    protected $file;
    /**
     * List of firstnames to check on document.
     *
     * @var string[]|null
     */
    protected $firstNames;
    /**
     * Birth name to check on document.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * Birth date to check on document.
     *
     * @var \DateTime|null
     */
    protected $birthDate;

    /**
     * Content in base 64 of the document to check.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Content in base 64 of the document to check.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * List of firstnames to check on document.
     *
     * @return string[]|null
     */
    public function getFirstNames(): ?array
    {
        return $this->firstNames;
    }

    /**
     * List of firstnames to check on document.
     *
     * @param string[]|null $firstNames
     */
    public function setFirstNames(?array $firstNames): self
    {
        $this->firstNames = $firstNames;

        return $this;
    }

    /**
     * Birth name to check on document.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * Birth name to check on document.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * Birth date to check on document.
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * Birth date to check on document.
     */
    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
