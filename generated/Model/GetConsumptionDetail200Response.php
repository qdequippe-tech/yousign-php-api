<?php

namespace Qdequippe\Yousign\Api\Model;

class GetConsumptionDetail200Response extends \ArrayObject
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
     * @var PaginationWithUpdatedAt|null
     */
    protected $meta;
    /**
     * @var list<DetailedConsumption>|null
     */
    protected $data;

    /**
     * Cursor based pagination.
     */
    public function getMeta(): ?PaginationWithUpdatedAt
    {
        return $this->meta;
    }

    /**
     * Cursor based pagination.
     */
    public function setMeta(?PaginationWithUpdatedAt $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return list<DetailedConsumption>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<DetailedConsumption>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
