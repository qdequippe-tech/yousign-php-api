<?php

namespace Qdequippe\Yousign\Api\Model;

class PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest extends \ArrayObject
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
     * @var PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo|null
     */
    protected $info;

    public function getInfo(): ?PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo
    {
        return $this->info;
    }

    public function setInfo(?PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }
}
