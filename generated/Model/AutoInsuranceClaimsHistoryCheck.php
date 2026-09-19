<?php

namespace Qdequippe\Yousign\Api\Model;

class AutoInsuranceClaimsHistoryCheck
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
     * Check result for the policy holder.
     *
     * @var AutoInsuranceClaimsHistoryCheckPolicyHolder|null
     */
    protected $policyHolder;

    /**
     * Check result for the policy holder.
     */
    public function getPolicyHolder(): ?AutoInsuranceClaimsHistoryCheckPolicyHolder
    {
        return $this->policyHolder;
    }

    /**
     * Check result for the policy holder.
     */
    public function setPolicyHolder(?AutoInsuranceClaimsHistoryCheckPolicyHolder $policyHolder): self
    {
        $this->initialized['policyHolder'] = true;
        $this->policyHolder = $policyHolder;

        return $this;
    }
}
