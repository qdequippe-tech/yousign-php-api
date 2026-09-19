<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class GetSignatureRequests200Response implements AdditionalPropertiesInterface
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
     * Pagination metadata for the response.
     *
     * @var GetSignatureRequests200ResponseMeta|null
     */
    protected $meta;
    /**
     * List of Signature Requests matching the query.
     *
     * @var list<SignatureRequestInList>|null
     */
    protected $data;

    /**
     * Pagination metadata for the response.
     */
    public function getMeta(): ?GetSignatureRequests200ResponseMeta
    {
        return $this->meta;
    }

    /**
     * Pagination metadata for the response.
     */
    public function setMeta(?GetSignatureRequests200ResponseMeta $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;

        return $this;
    }

    /**
     * List of Signature Requests matching the query.
     *
     * @return list<SignatureRequestInList>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * List of Signature Requests matching the query.
     *
     * @param list<SignatureRequestInList>|null $data
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
