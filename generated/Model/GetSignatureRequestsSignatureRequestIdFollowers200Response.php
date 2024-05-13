<?php

namespace Qdequippe\Yousign\Api\Model;

class GetSignatureRequestsSignatureRequestIdFollowers200Response extends \ArrayObject
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
     * @var list<Follower>|null
     */
    protected $data;

    /**
     * @return list<Follower>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<Follower>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
