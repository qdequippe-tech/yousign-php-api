<?php

namespace Qdequippe\Yousign\Api\Model;

class GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response extends \ArrayObject
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
     * @var list<SignerDocumentRequest>|null
     */
    protected $data;

    /**
     * @return list<SignerDocumentRequest>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param list<SignerDocumentRequest>|null $data
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
