<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ProofOfAddressVerificationFullAllOfData implements AdditionalPropertiesInterface
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
     * Data extracted from the provided proof of address document.
     *
     * @var ProofOfAddressVerificationFullAllOfDataExtractedFromDocument|null
     */
    protected $extractedFromDocument;

    /**
     * Data extracted from the provided proof of address document.
     */
    public function getExtractedFromDocument(): ?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument
    {
        return $this->extractedFromDocument;
    }

    /**
     * Data extracted from the provided proof of address document.
     */
    public function setExtractedFromDocument(?ProofOfAddressVerificationFullAllOfDataExtractedFromDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['extractedFromDocument' => ['extracted_from_document', 'getExtractedFromDocument', 'setExtractedFromDocument']];
    }
}
