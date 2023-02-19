<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class AuthenticationsSmsIdPutResponse400
{
    /**
     * Description of error.
     *
     * @var string|null
     */
    protected $detail;

    /**
     * Description of error.
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * Description of error.
     */
    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
}
