<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response implements AdditionalPropertiesInterface
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
     * Metadata about the response.
     *
     * @var Pagination|null
     */
    protected $meta;
    /**
     * @var list<SignerDocument>|null
     */
    protected $data;

    /**
     * Metadata about the response.
     */
    public function getMeta(): ?Pagination
    {
        return $this->meta;
    }

    /**
     * Metadata about the response.
     */
    public function setMeta(?Pagination $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return list<SignerDocument>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<SignerDocument>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['meta' => ['meta', 'getMeta', 'setMeta'], 'data' => ['data', 'getData', 'setData']];
    }
}
