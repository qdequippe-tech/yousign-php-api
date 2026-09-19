<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class DocumentInitialsPerPageInner implements AdditionalPropertiesInterface
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
     * Page number.
     *
     * @var int|null
     */
    protected $page;
    /**
     * Y-axis position of the initials on the page.
     *
     * @var int|null
     */
    protected $y;

    /**
     * Page number.
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * Page number.
     */
    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Y-axis position of the initials on the page.
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * Y-axis position of the initials on the page.
     */
    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['page' => ['page', 'getPage', 'setPage'], 'y' => ['y', 'getY', 'setY']];
    }
}
