<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignerConsentRequestSettings extends \ArrayObject
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
     * Text associated to the checkbox. This property cannot start or end with whitespace, does not allow html tags or email.
     *
     * @var string|null
     */
    protected $text;

    /**
     * Text associated to the checkbox. This property cannot start or end with whitespace, does not allow html tags or email.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Text associated to the checkbox. This property cannot start or end with whitespace, does not allow html tags or email.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }
}
