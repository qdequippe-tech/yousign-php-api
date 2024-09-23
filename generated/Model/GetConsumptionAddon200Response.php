<?php

namespace Qdequippe\Yousign\Api\Model;

class GetConsumptionAddon200Response extends \ArrayObject
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
     * @var list<AddonConsumption>|null
     */
    protected $data;

    /**
     * @return list<AddonConsumption>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<AddonConsumption>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
