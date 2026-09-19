<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestEmbeddedPreparationRedirectUrls
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
     * URL the end-user is redirected to after clicking `Done`. If omitted, the default success screen is shown.
     *
     * @var string|null
     */
    protected $done;
    /**
     * URL the end-user is redirected to after clicking `Back`. The `Back` button is shown only when this URL is set and its display setting is on.
     *
     * @var string|null
     */
    protected $back;

    /**
     * URL the end-user is redirected to after clicking `Done`. If omitted, the default success screen is shown.
     */
    public function getDone(): ?string
    {
        return $this->done;
    }

    /**
     * URL the end-user is redirected to after clicking `Done`. If omitted, the default success screen is shown.
     */
    public function setDone(?string $done): self
    {
        $this->initialized['done'] = true;
        $this->done = $done;

        return $this;
    }

    /**
     * URL the end-user is redirected to after clicking `Back`. The `Back` button is shown only when this URL is set and its display setting is on.
     */
    public function getBack(): ?string
    {
        return $this->back;
    }

    /**
     * URL the end-user is redirected to after clicking `Back`. The `Back` button is shown only when this URL is set and its display setting is on.
     */
    public function setBack(?string $back): self
    {
        $this->initialized['back'] = true;
        $this->back = $back;

        return $this;
    }
}
