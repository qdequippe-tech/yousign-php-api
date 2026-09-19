<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateDocumentFromMultipartInitials implements AdditionalPropertiesInterface
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
     * Alignment of the Initials on the document. The `left`, `right` and `center` options are aligned on top of the page by default.
     *
     * @var string|null
     */
    protected $alignment;
    /**
     * Offset of the initials from the edge of the page (in pixels). The offset is from the top or bottom of the page, depending on what has been defined in the `alignment` attribute.
     *
     * @var int|null
     */
    protected $y;

    /**
     * Alignment of the Initials on the document. The `left`, `right` and `center` options are aligned on top of the page by default.
     */
    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    /**
     * Alignment of the Initials on the document. The `left`, `right` and `center` options are aligned on top of the page by default.
     */
    public function setAlignment(?string $alignment): self
    {
        $this->initialized['alignment'] = true;
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Offset of the initials from the edge of the page (in pixels). The offset is from the top or bottom of the page, depending on what has been defined in the `alignment` attribute.
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * Offset of the initials from the edge of the page (in pixels). The offset is from the top or bottom of the page, depending on what has been defined in the `alignment` attribute.
     */
    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['alignment' => ['alignment', 'getAlignment', 'setAlignment'], 'y' => ['y', 'getY', 'setY']];
    }
}
