<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerDocumentRequest extends \ArrayObject
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
     * Unique identifier of the Signer Document Request.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Title of the document request.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Define if the document request is optional for the Signers.
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Ids of Signers to request a document.
     *
     * @var list<string>|null
     */
    protected $signerIds;

    /**
     * Unique identifier of the Signer Document Request.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Signer Document Request.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Title of the document request.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Title of the document request.
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * Define if the document request is optional for the Signers.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Define if the document request is optional for the Signers.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

        return $this;
    }

    /**
     * Ids of Signers to request a document.
     *
     * @return list<string>|null
     */
    public function getSignerIds(): ?array
    {
        return $this->signerIds;
    }

    /**
     * Ids of Signers to request a document.
     *
     * @param list<string>|null $signerIds
     */
    public function setSignerIds(?array $signerIds): self
    {
        $this->initialized['signerIds'] = true;
        $this->signerIds = $signerIds;

        return $this;
    }
}
