<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class AuthenticationsSmsIdPutBody
{
    /**
     * Code sms received by user.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Image of signature (base 64).
     *
     * @var string|null
     */
    protected $signImage;

    /**
     * Code sms received by user.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Code sms received by user.
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

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
