<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignatureRequestMetadata extends \ArrayObject
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
     * @var array<string, mixed>|null
     */
    protected $data;

    /**
     * @return array<string, mixed>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }

    /**
     * @param array<string, mixed>|null $data
     */
    public function setData(?iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
