<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NewApproverFromScratch implements AdditionalPropertiesInterface
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
     * @var NewApproverFromScratchInfo|null
     */
    protected $info;

    public function getInfo(): ?NewApproverFromScratchInfo
    {
        return $this->info;
    }

    public function setInfo(?NewApproverFromScratchInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['info' => ['info', 'getInfo', 'setInfo']];
    }
}
