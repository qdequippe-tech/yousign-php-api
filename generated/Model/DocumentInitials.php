<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class DocumentInitials implements AdditionalPropertiesInterface
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
     * Alignment of the initials on the document’s pages.
     *
     * @var string|null
     */
    protected $alignment;
    /**
     * Y-axis position of the initials on the first page of the document.
     *
     * @var int|null
     */
    protected $y;
    /**
     * @var list<DocumentInitialsPerPageInner>|null
     */
    protected $perPage;

    /**
     * Alignment of the initials on the document’s pages.
     */
    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    /**
     * Alignment of the initials on the document’s pages.
     */
    public function setAlignment(?string $alignment): self
    {
        $this->initialized['alignment'] = true;
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Y-axis position of the initials on the first page of the document.
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * Y-axis position of the initials on the first page of the document.
     */
    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }

    /**
     * @return list<DocumentInitialsPerPageInner>|null
     */
    public function getPerPage(): ?array
    {
        return $this->perPage;
    }

    /**
     * @param list<DocumentInitialsPerPageInner>|null $perPage
     */
    public function setPerPage(?array $perPage): self
    {
        $this->initialized['perPage'] = true;
        $this->perPage = $perPage;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['alignment' => ['alignment', 'getAlignment', 'setAlignment'], 'y' => ['y', 'getY', 'setY'], 'perPage' => ['per_page', 'getPerPage', 'setPerPage']];
    }
}
