<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateVideoIdentityVerification extends \ArrayObject
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
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     *
     * @var string|null
     */
    protected $redirectionUrl;
    /**
     * Enable face recognition step in the Identity verification flow.
     *
     * @var bool|null
     */
    protected $faceRecognition = false;

    /**
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The first name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If multiple given names are listed on the document, you must provide only one of them.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The last name provided must match exactly as it appears on the ID document, as a consistency check will be performed. If both a birth name and a usage name are listed on the document, you must provide one of them, but not both.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     */
    public function getRedirectionUrl(): ?string
    {
        return $this->redirectionUrl;
    }

    /**
     * The URL to redirect the person back to your application or website after the identity verification flow is complete.
     */
    public function setRedirectionUrl(?string $redirectionUrl): self
    {
        $this->initialized['redirectionUrl'] = true;
        $this->redirectionUrl = $redirectionUrl;

        return $this;
    }

    /**
     * Enable face recognition step in the Identity verification flow.
     */
    public function getFaceRecognition(): ?bool
    {
        return $this->faceRecognition;
    }

    /**
     * Enable face recognition step in the Identity verification flow.
     */
    public function setFaceRecognition(?bool $faceRecognition): self
    {
        $this->initialized['faceRecognition'] = true;
        $this->faceRecognition = $faceRecognition;

        return $this;
    }
}
