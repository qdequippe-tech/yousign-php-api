<?php

namespace Qdequippe\Yousign\Api\Model;

class VideoIdentityVerificationDocument extends \ArrayObject
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
     * Full name on the document.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Date of birth on the document.
     *
     * @var \DateTime|null
     */
    protected $birthAt;
    /**
     * Type of document.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * @var string|null
     */
    protected $documentIssuingCountry;
    /**
     * Temporary public link to the front image. Available for 10 minutes.
     *
     * @var string|null
     */
    protected $frontImageUrl;

    /**
     * Full name on the document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name on the document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Date of birth on the document.
     */
    public function getBirthAt(): ?\DateTime
    {
        return $this->birthAt;
    }

    /**
     * Date of birth on the document.
     */
    public function setBirthAt(?\DateTime $birthAt): self
    {
        $this->initialized['birthAt'] = true;
        $this->birthAt = $birthAt;

        return $this;
    }

    /**
     * Type of document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Type of document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    public function getDocumentIssuingCountry(): ?string
    {
        return $this->documentIssuingCountry;
    }

    public function setDocumentIssuingCountry(?string $documentIssuingCountry): self
    {
        $this->initialized['documentIssuingCountry'] = true;
        $this->documentIssuingCountry = $documentIssuingCountry;

        return $this;
    }

    /**
     * Temporary public link to the front image. Available for 10 minutes.
     */
    public function getFrontImageUrl(): ?string
    {
        return $this->frontImageUrl;
    }

    /**
     * Temporary public link to the front image. Available for 10 minutes.
     */
    public function setFrontImageUrl(?string $frontImageUrl): self
    {
        $this->initialized['frontImageUrl'] = true;
        $this->frontImageUrl = $frontImageUrl;

        return $this;
    }
}
