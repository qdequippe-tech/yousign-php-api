<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class FileObjectOutput
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * @var FileOutput|null
     */
    protected $file;
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
     * [type=signature] Name of the signature field existing in the document.
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * [type=signature] Text associated above the signature image.

     *
     * @var string|null
     */
    protected $mention;
    /**
     * [type=signature] Text associated below the signature image. (internal usage only, should not be used).

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
     * [type=signature] The reason they are signing the agreement.
     *
     * @var string|null
     */
    protected $reason = 'Signed by Firstname Lastname';
    /**
     * The type of the file object.
     *
     * @var string|null
     */
    protected $type = 'signature';
    /**
     * [type=text] Indicate if the member must fill or not the field.
     *
     * @var bool|null
     */
    protected $contentRequired = false;
    /**
     * [type=text] The content of the field. Could be used for placeholder.
     *
     * @var string|null
     */
    protected $content;
    /**
     * [type=text] The font familly used to render the TextField. Currently only the default value will be used.
     *
     * @var string|null
     */
    protected $fontFamily = 'raleway';
    /**
     * [type=text] The font size used to render the field. Currently only the default value will be used.
     *
     * @var int|null
     */
    protected $fontSize = 12;
    /**
     * [type=text] The font color used to render the field.
     *
     * @var string|null
     */
    protected $fontColor;

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

    public function getFile(): ?FileOutput
    {
        return $this->file;
    }

    public function setFile(?FileOutput $file): self
    {
        $this->file = $file;

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
     * [type=signature] Name of the signature field existing in the document.
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * [type=signature] Name of the signature field existing in the document.
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * [type=signature] Text associated above the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * [type=signature] Text associated above the signature image.

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function setMention(?string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * [type=signature] Text associated below the signature image. (internal usage only, should not be used).

    You can use some variable inside : {{date.en}} {{date.fr}} {{time.en}} {{time.fr}} that it will be parsed to show the date of the signature.
     */
    public function getMention2Internal(): ?string
    {
        return $this->mention2Internal;
    }

    /**
     * [type=signature] Text associated below the signature image. (internal usage only, should not be used).

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
     * [type=signature] The reason they are signing the agreement.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * [type=signature] The reason they are signing the agreement.
     */
    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * The type of the file object.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The type of the file object.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * [type=text] Indicate if the member must fill or not the field.
     */
    public function getContentRequired(): ?bool
    {
        return $this->contentRequired;
    }

    /**
     * [type=text] Indicate if the member must fill or not the field.
     */
    public function setContentRequired(?bool $contentRequired): self
    {
        $this->contentRequired = $contentRequired;

        return $this;
    }

    /**
     * [type=text] The content of the field. Could be used for placeholder.
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * [type=text] The content of the field. Could be used for placeholder.
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * [type=text] The font familly used to render the TextField. Currently only the default value will be used.
     */
    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    /**
     * [type=text] The font familly used to render the TextField. Currently only the default value will be used.
     */
    public function setFontFamily(?string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    /**
     * [type=text] The font size used to render the field. Currently only the default value will be used.
     */
    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    /**
     * [type=text] The font size used to render the field. Currently only the default value will be used.
     */
    public function setFontSize(?int $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * [type=text] The font color used to render the field.
     */
    public function getFontColor(): ?string
    {
        return $this->fontColor;
    }

    /**
     * [type=text] The font color used to render the field.
     */
    public function setFontColor(?string $fontColor): self
    {
        $this->fontColor = $fontColor;

        return $this;
    }
}
