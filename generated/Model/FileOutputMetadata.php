<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class FileOutputMetadata
{
    /**
     * @var string|null
     */
    protected $key1;
    /**
     * @var int|null
     */
    protected $key2;

    public function getKey1(): ?string
    {
        return $this->key1;
    }

    public function setKey1(?string $key1): self
    {
        $this->key1 = $key1;

        return $this;
    }

    public function getKey2(): ?int
    {
        return $this->key2;
    }

    public function setKey2(?int $key2): self
    {
        $this->key2 = $key2;

        return $this;
    }
}
