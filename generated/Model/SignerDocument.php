<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerDocument extends \ArrayObject
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
     * Unique identifier of the signer document.
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
     * @var string|null
     */
    protected $filename;

    /**
     * Unique identifier of the signer document.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the signer document.
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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;

        return $this;
    }
}
