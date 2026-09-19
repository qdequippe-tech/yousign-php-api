<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateElectronicSealImagePreviewPayloadFieldCaptionsInner
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
     * The caption text to display on the seal image.
     *
     * @var string|null
     */
    protected $text;

    /**
     * The caption text to display on the seal image.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * The caption text to display on the seal image.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }
}
