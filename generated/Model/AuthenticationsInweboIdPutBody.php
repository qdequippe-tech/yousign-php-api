<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class AuthenticationsInweboIdPutBody
{
    /**
     * Image of signature (base 64).
     *
     * @var string|null
     */
    protected $signImage;

    /**
     * Image of signature (base 64).
     */
    public function getSignImage(): ?string
    {
        return $this->signImage;
    }

    /**
     * Image of signature (base 64).
     */
    public function setSignImage(?string $signImage): self
    {
        $this->signImage = $signImage;

        return $this;
    }
}
