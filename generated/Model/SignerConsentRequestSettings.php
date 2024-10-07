<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerConsentRequestSettings extends \ArrayObject
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
     * Text associated to the checkbox.
     *
     * @var string|null
     */
    protected $text;

    /**
     * Text associated to the checkbox.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Text associated to the checkbox.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }
}
