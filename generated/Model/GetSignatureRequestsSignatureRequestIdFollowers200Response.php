<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class GetSignatureRequestsSignatureRequestIdFollowers200Response implements AdditionalPropertiesInterface
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

    public function definedProperties(): array
    {
        return ['data' => ['data', 'getData', 'setData']];
    }
}
