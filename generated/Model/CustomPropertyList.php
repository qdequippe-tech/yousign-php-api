<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomPropertyList implements AdditionalPropertiesInterface
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
     * List of custom properties.
     *
     * @var list<CustomProperty>|null
     */
    protected $data;
    /**
     * Cursor for the next page.
     * Null if no more pages available.
     *
     * @var string|null
     */
    protected $nextCursor;

    /**
     * List of custom properties.
     *
     * @return list<CustomProperty>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * List of custom properties.
     *
     * @param list<CustomProperty>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

    /**
     * Cursor for the next page.
     * Null if no more pages available.
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }

    /**
     * Cursor for the next page.
     * Null if no more pages available.
     */
    public function setNextCursor(?string $nextCursor): self
    {
        $this->initialized['nextCursor'] = true;
        $this->nextCursor = $nextCursor;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['data' => ['data', 'getData', 'setData'], 'nextCursor' => ['next_cursor', 'getNextCursor', 'setNextCursor']];
    }
}
