<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateElectronicSealImagePreviewPayloadField
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
     * Width of the seal field in pixels.
     *
     * @var int|null
     */
    protected $width;
    /**
     * Height of the seal field in pixels.
     *
     * @var int|null
     */
    protected $height;
    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @var list<CreateElectronicSealImagePreviewPayloadFieldCaptionsInner>|null
     */
    protected $captions;

    /**
     * Width of the seal field in pixels.
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Width of the seal field in pixels.
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;

        return $this;
    }

    /**
     * Height of the seal field in pixels.
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Height of the seal field in pixels.
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @return list<CreateElectronicSealImagePreviewPayloadFieldCaptionsInner>|null
     */
    public function getCaptions(): ?array
    {
        return $this->captions;
    }

    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @param list<CreateElectronicSealImagePreviewPayloadFieldCaptionsInner>|null $captions
     */
    public function setCaptions(?array $captions): self
    {
        $this->initialized['captions'] = true;
        $this->captions = $captions;

        return $this;
    }
}
