<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput
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
     * Placeholder label of the read-only text Field to substitute.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Text value substituted into the read-only text Field.
     *
     * @var string|null
     */
    protected $text;

    /**
     * Placeholder label of the read-only text Field to substitute.
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Placeholder label of the read-only text Field to substitute.
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * Text value substituted into the read-only text Field.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Text value substituted into the read-only text Field.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }
}
