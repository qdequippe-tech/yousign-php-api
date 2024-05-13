<?php

namespace Qdequippe\Yousign\Api\Model;

class GetWorkspaces200Response extends \ArrayObject
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
     * @var list<Workspace>|null
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
     * @return list<Workspace>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<Workspace>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
