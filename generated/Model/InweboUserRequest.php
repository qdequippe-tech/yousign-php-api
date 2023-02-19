<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class InweboUserRequest
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }
}
