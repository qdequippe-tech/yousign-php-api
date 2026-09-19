<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class GetSignatureRequestsIdLabels200Response implements AdditionalPropertiesInterface
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
     * @var GetSignatureRequestsIdLabels200ResponseMeta|null
     */
    protected $meta;
    /**
     * List of Labels associated with the Signature Request.
     *
     * @var list<SignatureRequestLabel>|null
     */
    protected $data;

    /**
     * Pagination metadata for the response.
     */
    public function getMeta(): ?GetSignatureRequestsIdLabels200ResponseMeta
    {
        return $this->meta;
    }

    /**
     * Pagination metadata for the response.
     */
    public function setMeta(?GetSignatureRequestsIdLabels200ResponseMeta $meta): self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;

        return $this;
    }

    /**
     * List of Labels associated with the Signature Request.
     *
     * @return list<SignatureRequestLabel>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * List of Labels associated with the Signature Request.
     *
     * @param list<SignatureRequestLabel>|null $data
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
