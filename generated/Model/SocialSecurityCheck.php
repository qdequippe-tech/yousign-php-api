<?php

namespace Qdequippe\Yousign\Api\Model;

class SocialSecurityCheck
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
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     *
     * @var DocumentAnalysisCheck|null
     */
    protected $fullName;

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function getFullName(): ?DocumentAnalysisCheck
    {
        return $this->fullName;
    }

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function setFullName(?DocumentAnalysisCheck $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }
}
