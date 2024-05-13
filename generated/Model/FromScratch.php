<?php

namespace Qdequippe\Yousign\Api\Model;

class FromScratch extends \ArrayObject
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
     * @var FromScratchInfo|null
     */
    protected $info;

    public function getInfo(): ?FromScratchInfo
    {
        return $this->info;
    }

    public function setInfo(?FromScratchInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }
}
