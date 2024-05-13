<?php

namespace Qdequippe\Yousign\Api\Model;

class GetCustomExperiences200Response extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Cursor based pagination.
     *
     * @var Pagination|null
     */
    protected $meta;
    /**
     * @var list<CustomExperience>|null
     */
    protected $data;

    /**
     * Cursor based pagination.
     */
    public function getMeta(): ?Pagination
    {
        return $this->meta;
    }

    /**
     * Cursor based pagination.
     */
    public function setMeta(?Pagination $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return list<CustomExperience>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<CustomExperience>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
