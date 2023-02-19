<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class FileObjectOutputWithoutFileReference
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Page of the visible signature. This property is ignored if fieldName is set. If you want a visible signature, you must set page, position and fieldName.
     *
     * @var int|null
     */
    protected $page;
    /**
     * Coordinates of the signature image to set. Format is : “llx,lly,urx,ury”. llx=left lower x coordinate, lly=left lower y coordinate, urx=upper right x coordinate, ury = upper right y coordinate. To get easily coordinates, you could use this tool : http://placeit.yousign.fr.
     *
     * @var string|null
     */
    protected $position;
    /**
     * Name of the signature field existing in the document.
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * Text associated above the signature image.

     *
     * @var string|null
     */
    protected $mention;
    /**
     * Text associated below the signature image.

     *
     * @var string|null
     */
    protected $mention2Internal;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Date of signature or validation.
     *
     * @var \DateTime|null
     */
    protected $executedAt;
    /**
     * The reason they are signing the agreement.
     *
     * @var string|null
     */
    protected $reason = 'Signed by Yousign';

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Page of the visible signature. This property is ignored if fieldName is set. If you want a visible signature, you must set page, position and fieldName.
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * Page of the visible signature. This property is ignored if fieldName is set. If you want a visible signature, you must set page, position and fieldName.
     */
    public function setPage(?int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Coordinates of the signature image to set. Format is : “llx,lly,urx,ury”. llx=left lower x coordinate, lly=left lower y coordinate, urx=upper right x coordinate, ury = upper right y coordinate. To get easily coordinates, you could use this tool : http://placeit.yousign.fr.
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * Coordinates of the signature image to set. Format is : “llx,lly,urx,ury”. llx=left lower x coordinate, lly=left lower y coordinate, urx=upper right x coordinate, ury = upper right y coordinate. To get easily coordinates, you could use this tool : http://placeit.yousign.fr.
     */
    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Name of the signature field existing in the document.
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * Name of the signature field existing in the document.
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * Text associated above the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * Text associated above the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function setMention(?string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Text associated below the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function getMention2Internal(): ?string
    {
        return $this->mention2Internal;
    }

    /**
     * Text associated below the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function setMention2Internal(?string $mention2Internal): self
    {
        $this->mention2Internal = $mention2Internal;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Date of signature or validation.
     */
    public function getExecutedAt(): ?\DateTime
    {
        return $this->executedAt;
    }

    /**
     * Date of signature or validation.
     */
    public function setExecutedAt(?\DateTime $executedAt): self
    {
        $this->executedAt = $executedAt;

        return $this;
    }

    /**
     * The reason they are signing the agreement.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * The reason they are signing the agreement.
     */
    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }
}
