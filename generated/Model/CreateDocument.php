<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateDocument extends \ArrayObject
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
     * Binary file.
     *
     * @var string|null
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $nature;
    /**
     * Insert just after the position of the specified document id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * @var string|null
     */
    protected $password;
    /**
     * @var InitialsArea|null
     */
    protected $initials;
    /**
     * @var bool|null
     */
    protected $parseAnchors;

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

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    public function getInitials(): ?InitialsArea
    {
        return $this->initials;
    }

    public function setInitials(?InitialsArea $initials): self
    {
        $this->initialized['initials'] = true;
        $this->initials = $initials;

        return $this;
    }

    public function getParseAnchors(): ?bool
    {
        return $this->parseAnchors;
    }

    public function setParseAnchors(?bool $parseAnchors): self
    {
        $this->initialized['parseAnchors'] = true;
        $this->parseAnchors = $parseAnchors;

        return $this;
    }
}
