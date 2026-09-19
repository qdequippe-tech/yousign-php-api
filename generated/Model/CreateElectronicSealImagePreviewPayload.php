<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateElectronicSealImagePreviewPayload
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
     * The ID of an existing Electronic Seal Image to use as the visual stamp.
     *
     * @var string|null
     */
    protected $imageId;
    /**
     * The seal field dimensions and optional caption.
     *
     * @var CreateElectronicSealImagePreviewPayloadField|null
     */
    protected $field;

    /**
     * The ID of an existing Electronic Seal Image to use as the visual stamp.
     */
    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    /**
     * The ID of an existing Electronic Seal Image to use as the visual stamp.
     */
    public function setImageId(?string $imageId): self
    {
        $this->initialized['imageId'] = true;
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * The seal field dimensions and optional caption.
     */
    public function getField(): ?CreateElectronicSealImagePreviewPayloadField
    {
        return $this->field;
    }

    /**
     * The seal field dimensions and optional caption.
     */
    public function setField(?CreateElectronicSealImagePreviewPayloadField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;

        return $this;
    }
}
