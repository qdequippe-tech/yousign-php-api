<?php

namespace Qdequippe\Yousign\Api\Model;

class VideoIdentityVerification extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * Indicates the position in the lifecycle and the action to be taken.
     *
     * @var string|null
     */
    protected $status;
    /**
     * List of status codes. Indicates the cause when the status is pending, approved, declined or inconclusive. More details on codes can be found here https://developers.yousign.com/docs/follow-identity-verification-status#status-codes.
     *
     * @var list<int>|null
     */
    protected $statusCodes;
    /**
     * Verified information from the document.
     *
     * @var VideoIdentityVerificationVerified|null
     */
    protected $verified;
    /**
     * Declared information from the document.
     *
     * @var VideoIdentityVerificationDeclared|null
     */
    protected $declared;
    /**
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     *
     * @var VideoIdentityVerificationDocument|null
     */
    protected $extractedFromDocument;
    /**
     * The URL of the verification page that the user used to begin the verification process.
     *
     * @var string|null
     */
    protected $verificationUrl;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Indicates the position in the lifecycle and the action to be taken.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Indicates the position in the lifecycle and the action to be taken.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * List of status codes. Indicates the cause when the status is pending, approved, declined or inconclusive. More details on codes can be found here https://developers.yousign.com/docs/follow-identity-verification-status#status-codes.
     *
     * @return list<int>|null
     */
    public function getStatusCodes(): ?array
    {
        return $this->statusCodes;
    }

    /**
     * List of status codes. Indicates the cause when the status is pending, approved, declined or inconclusive. More details on codes can be found here https://developers.yousign.com/docs/follow-identity-verification-status#status-codes.
     *
     * @param list<int>|null $statusCodes
     */
    public function setStatusCodes(?array $statusCodes): self
    {
        $this->initialized['statusCodes'] = true;
        $this->statusCodes = $statusCodes;

        return $this;
    }

    /**
     * Verified information from the document.
     */
    public function getVerified(): ?VideoIdentityVerificationVerified
    {
        return $this->verified;
    }

    /**
     * Verified information from the document.
     */
    public function setVerified(?VideoIdentityVerificationVerified $verified): self
    {
        $this->initialized['verified'] = true;
        $this->verified = $verified;

        return $this;
    }

    /**
     * Declared information from the document.
     */
    public function getDeclared(): ?VideoIdentityVerificationDeclared
    {
        return $this->declared;
    }

    /**
     * Declared information from the document.
     */
    public function setDeclared(?VideoIdentityVerificationDeclared $declared): self
    {
        $this->initialized['declared'] = true;
        $this->declared = $declared;

        return $this;
    }

    /**
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     */
    public function getExtractedFromDocument(): ?VideoIdentityVerificationDocument
    {
        return $this->extractedFromDocument;
    }

    /**
     * Includes all information that has been extracted from the document, as well as the best images of the document.
     */
    public function setExtractedFromDocument(?VideoIdentityVerificationDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    /**
     * The URL of the verification page that the user used to begin the verification process.
     */
    public function getVerificationUrl(): ?string
    {
        return $this->verificationUrl;
    }

    /**
     * The URL of the verification page that the user used to begin the verification process.
     */
    public function setVerificationUrl(?string $verificationUrl): self
    {
        $this->initialized['verificationUrl'] = true;
        $this->verificationUrl = $verificationUrl;

        return $this;
    }
}
