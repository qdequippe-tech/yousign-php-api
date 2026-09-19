<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class IdentityVideoFullAllOfData implements AdditionalPropertiesInterface
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
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     *
     * @var IdentityVideoDocument|null
     */
    protected $extractedFromDocument;
    /**
     * Documentary evidence captured during the verification process.
     *
     * @var IdentityVideoFullAllOfDataEvidence|null
     */
    protected $evidence;

    /**
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     */
    public function getExtractedFromDocument(): ?IdentityVideoDocument
    {
        return $this->extractedFromDocument;
    }

    /**
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     */
    public function setExtractedFromDocument(?IdentityVideoDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    /**
     * Documentary evidence captured during the verification process.
     */
    public function getEvidence(): ?IdentityVideoFullAllOfDataEvidence
    {
        return $this->evidence;
    }

    /**
     * Documentary evidence captured during the verification process.
     */
    public function setEvidence(?IdentityVideoFullAllOfDataEvidence $evidence): self
    {
        $this->initialized['evidence'] = true;
        $this->evidence = $evidence;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['extractedFromDocument' => ['extracted_from_document', 'getExtractedFromDocument', 'setExtractedFromDocument'], 'evidence' => ['evidence', 'getEvidence', 'setEvidence']];
    }
}
