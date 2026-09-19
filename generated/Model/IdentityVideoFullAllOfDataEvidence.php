<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class IdentityVideoFullAllOfDataEvidence implements AdditionalPropertiesInterface
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
     * Temporary public link to the front image. Available for 10 minutes after the user completed the verification.
     *
     * @var string|null
     */
    protected $documentFrontImageUrl;
    /**
     * Temporary public link to the back image. Available for 10 minutes after the user completed the verification.
     *
     * @var string|null
     */
    protected $documentBackImageUrl;
    /**
     * Temporary public link to the face image. Available for 10 minutes after the user completed the verification.
     *
     * @var string|null
     */
    protected $faceImageUrl;

    /**
     * Temporary public link to the front image. Available for 10 minutes after the user completed the verification.
     */
    public function getDocumentFrontImageUrl(): ?string
    {
        return $this->documentFrontImageUrl;
    }

    /**
     * Temporary public link to the front image. Available for 10 minutes after the user completed the verification.
     */
    public function setDocumentFrontImageUrl(?string $documentFrontImageUrl): self
    {
        $this->initialized['documentFrontImageUrl'] = true;
        $this->documentFrontImageUrl = $documentFrontImageUrl;

        return $this;
    }

    /**
     * Temporary public link to the back image. Available for 10 minutes after the user completed the verification.
     */
    public function getDocumentBackImageUrl(): ?string
    {
        return $this->documentBackImageUrl;
    }

    /**
     * Temporary public link to the back image. Available for 10 minutes after the user completed the verification.
     */
    public function setDocumentBackImageUrl(?string $documentBackImageUrl): self
    {
        $this->initialized['documentBackImageUrl'] = true;
        $this->documentBackImageUrl = $documentBackImageUrl;

        return $this;
    }

    /**
     * Temporary public link to the face image. Available for 10 minutes after the user completed the verification.
     */
    public function getFaceImageUrl(): ?string
    {
        return $this->faceImageUrl;
    }

    /**
     * Temporary public link to the face image. Available for 10 minutes after the user completed the verification.
     */
    public function setFaceImageUrl(?string $faceImageUrl): self
    {
        $this->initialized['faceImageUrl'] = true;
        $this->faceImageUrl = $faceImageUrl;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentFrontImageUrl' => ['document_front_image_url', 'getDocumentFrontImageUrl', 'setDocumentFrontImageUrl'], 'documentBackImageUrl' => ['document_back_image_url', 'getDocumentBackImageUrl', 'setDocumentBackImageUrl'], 'faceImageUrl' => ['face_image_url', 'getFaceImageUrl', 'setFaceImageUrl']];
    }
}
