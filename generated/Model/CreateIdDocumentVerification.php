<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateIdDocumentVerification extends \ArrayObject
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
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The document type to verify.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Binary file.
     *
     * @var string|null
     */
    protected $file;
    /**
     * Binary file.
     *
     * @var string|null
     */
    protected $additionalFile;

    /**
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Please provide the holder first name, exactly as it appears on the ID document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the ID document birth name.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The document type to verify.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type to verify.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Binary file.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Binary file.
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Binary file.
     */
    public function getAdditionalFile(): ?string
    {
        return $this->additionalFile;
    }

    /**
     * Binary file.
     */
    public function setAdditionalFile(?string $additionalFile): self
    {
        $this->initialized['additionalFile'] = true;
        $this->additionalFile = $additionalFile;

        return $this;
    }
}
