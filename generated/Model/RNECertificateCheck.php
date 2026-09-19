<?php

namespace Qdequippe\Yousign\Api\Model;

class RNECertificateCheck
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
     * @var list<CompanyCertificateCheckLegalRepresentativesInner>|null
     */
    protected $legalRepresentatives;

    /**
     * @return list<CompanyCertificateCheckLegalRepresentativesInner>|null
     */
    public function getLegalRepresentatives(): ?array
    {
        return $this->legalRepresentatives;
    }

    /**
     * @param list<CompanyCertificateCheckLegalRepresentativesInner>|null $legalRepresentatives
     */
    public function setLegalRepresentatives(?array $legalRepresentatives): self
    {
        $this->initialized['legalRepresentatives'] = true;
        $this->legalRepresentatives = $legalRepresentatives;

        return $this;
    }
}
