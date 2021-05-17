<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class AuthenticationEmailOutput
{
    /**
     * id of authentication.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Status of authentication.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Type of authentication.
     *
     * @var string|null
     */
    protected $type;

    /**
     * id of authentication.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * id of authentication.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Status of authentication.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of authentication.
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Type of authentication.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of authentication.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
