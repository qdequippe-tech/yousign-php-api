<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateAutoInsuranceClaimsHistoryChecks
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
     * Expected policy holder information.
     *
     * @var InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder|null
     */
    protected $policyHolder;

    /**
     * Expected policy holder information.
     */
    public function getPolicyHolder(): ?InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder
    {
        return $this->policyHolder;
    }

    /**
     * Expected policy holder information.
     */
    public function setPolicyHolder(?InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder $policyHolder): self
    {
        $this->initialized['policyHolder'] = true;
        $this->policyHolder = $policyHolder;

        return $this;
    }
}
