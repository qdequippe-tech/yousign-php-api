<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateDocument extends \ArrayObject
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
    protected $nature;
    /**
     * Insert just after the position of the specified document id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * The password required to unlock the document if it is protected.
     *
     * @var string|null
     */
    protected $password;
    /**
     * @var InitialsArea|null
     */
    protected $initials;

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

    /**
     * The password required to unlock the document if it is protected.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * The password required to unlock the document if it is protected.
     */
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
}
