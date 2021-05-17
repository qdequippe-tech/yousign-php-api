<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ConfigWebhookTemplate
{
    /**
     * Url to call.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Http request type.
     *
     * @var string|null
     */
    protected $method = 'GET';
    /**
     * Http request headers.
     *
     * @var mixed|null
     */
    protected $headers;

    /**
     * Url to call.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Url to call.
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Http request type.
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * Http request type.
     */
    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Http request headers.
     *
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Http request headers.
     *
     * @param mixed $headers
     */
    public function setHeaders($headers): self
    {
        $this->headers = $headers;

        return $this;
    }
}
