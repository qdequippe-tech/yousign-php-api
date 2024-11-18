<?php

namespace Qdequippe\Yousign\Api\Model;

class BankAccountVerification extends \ArrayObject
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
     * The unique identifier for a resource.
     *
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * List of response codes.
     *
     * @var list<int>|null
     */
    protected $statusCodes;
    /**
     * @var BankAccountVerificationExtractedFromDocument|null
     */
    protected $extractedFromDocument;

    /**
     * The unique identifier for a resource.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The unique identifier for a resource.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * List of response codes.
     *
     * @return list<int>|null
     */
    public function getStatusCodes(): ?array
    {
        return $this->statusCodes;
    }

    /**
     * List of response codes.
     *
     * @param list<int>|null $statusCodes
     */
    public function setStatusCodes(?array $statusCodes): self
    {
        $this->initialized['statusCodes'] = true;
        $this->statusCodes = $statusCodes;

        return $this;
    }

    public function getExtractedFromDocument(): ?BankAccountVerificationExtractedFromDocument
    {
        return $this->extractedFromDocument;
    }

    public function setExtractedFromDocument(?BankAccountVerificationExtractedFromDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }
}
