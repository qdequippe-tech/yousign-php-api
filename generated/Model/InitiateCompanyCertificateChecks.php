<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateCompanyCertificateChecks
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
     * Expected list of legal representatives extracted from the document.
     *
     * @var list<InitiateCompanyCertificateChecksLegalRepresentativesInner>|null
     */
    protected $legalRepresentatives;

    /**
     * Expected list of legal representatives extracted from the document.
     *
     * @return list<InitiateCompanyCertificateChecksLegalRepresentativesInner>|null
     */
    public function getLegalRepresentatives(): ?array
    {
        return $this->legalRepresentatives;
    }

    /**
     * Expected list of legal representatives extracted from the document.
     *
     * @param list<InitiateCompanyCertificateChecksLegalRepresentativesInner>|null $legalRepresentatives
     */
    public function setLegalRepresentatives(?array $legalRepresentatives): self
    {
        $this->initialized['legalRepresentatives'] = true;
        $this->legalRepresentatives = $legalRepresentatives;

        return $this;
    }
}
