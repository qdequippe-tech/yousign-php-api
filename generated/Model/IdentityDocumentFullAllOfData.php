<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class IdentityDocumentFullAllOfData implements AdditionalPropertiesInterface
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
     * Information extracted from the verified identity document.
     *
     * @var IdentityDocumentFullAllOfDataExtractedFromDocument|null
     */
    protected $extractedFromDocument;

    /**
     * Information extracted from the verified identity document.
     */
    public function getExtractedFromDocument(): ?IdentityDocumentFullAllOfDataExtractedFromDocument
    {
        return $this->extractedFromDocument;
    }

    /**
     * Information extracted from the verified identity document.
     */
    public function setExtractedFromDocument(?IdentityDocumentFullAllOfDataExtractedFromDocument $extractedFromDocument): self
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
