<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyCertificateCheckLegalRepresentativesInner implements AdditionalPropertiesInterface
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

    public function definedProperties(): array
    {
        return ['fullName' => ['full_name', 'getFullName', 'setFullName']];
    }
}
