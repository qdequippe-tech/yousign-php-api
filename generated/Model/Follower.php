<?php

namespace Qdequippe\Yousign\Api\Model;

class Follower extends \ArrayObject
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
    protected $email;
    /**
     * Locale settings used for communication.
     *
     * @var string|null
     */
    protected $locale;
    /**
     * @var string|null
     */
    protected $followerLink;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * Locale settings used for communication.
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * Locale settings used for communication.
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;

        return $this;
    }

    public function getFollowerLink(): ?string
    {
        return $this->followerLink;
    }

    public function setFollowerLink(?string $followerLink): self
    {
        $this->initialized['followerLink'] = true;
        $this->followerLink = $followerLink;

        return $this;
    }
}
