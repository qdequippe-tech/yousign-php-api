<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Pagination implements AdditionalPropertiesInterface
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
     * Token to get the next page of results. If `null`, there are no more pages.
     *
     * @var string|null
     */
    protected $nextCursor;

    /**
     * Token to get the next page of results. If `null`, there are no more pages.
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }

    /**
     * Token to get the next page of results. If `null`, there are no more pages.
     */
    public function setNextCursor(?string $nextCursor): self
    {
        $this->initialized['nextCursor'] = true;
        $this->nextCursor = $nextCursor;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['nextCursor' => ['next_cursor', 'getNextCursor', 'setNextCursor']];
    }
}
