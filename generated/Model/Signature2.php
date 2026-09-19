<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Signature2 implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Identifier of the Document the signature Field is placed on.
     *
     * @var string|null
     */
    protected $documentId;
    /**
     * Field type discriminator.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Page number where the Field is placed.
     *
     * @var int|null
     */
    protected $page;
    /**
     * Horizontal position (points from left).
     *
     * @var int|null
     */
    protected $x;
    /**
     * Vertical position (points from top).
     *
     * @var int|null
     */
    protected $y;
    /**
     * Height of the signature Field in points (default 37).
     *
     * @var int|null
     */
    protected $height;
    /**
     * Width of the signature Field in points (default 85).
     *
     * @var int|null
     */
    protected $width;
    /**
     * Provide extra context to explain why the Document is being signed. Once the Document is signed, the custom reason is stored in the Audit Trail and is included in the signature certificate.
     * The default value is: "Signed by [Signer first name] [Signer last name]".
     *
     * @var string|null
     */
    protected $reason;

    /**
     * Identifier of the Document the signature Field is placed on.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Identifier of the Document the signature Field is placed on.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Field type discriminator.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Field type discriminator.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Page number where the Field is placed.
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * Page number where the Field is placed.
     */
    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Horizontal position (points from left).
     */
    public function getX(): ?int
    {
        return $this->x;
    }

    /**
     * Horizontal position (points from left).
     */
    public function setX(?int $x): self
    {
        $this->initialized['x'] = true;
        $this->x = $x;

        return $this;
    }

    /**
     * Vertical position (points from top).
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * Vertical position (points from top).
     */
    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }

    /**
     * Height of the signature Field in points (default 37).
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Height of the signature Field in points (default 37).
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    /**
     * Width of the signature Field in points (default 85).
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Width of the signature Field in points (default 85).
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;

        return $this;
    }

    /**
     * Provide extra context to explain why the Document is being signed. Once the Document is signed, the custom reason is stored in the Audit Trail and is included in the signature certificate.
     * The default value is: "Signed by [Signer first name] [Signer last name]".
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Provide extra context to explain why the Document is being signed. Once the Document is signed, the custom reason is stored in the Audit Trail and is included in the signature certificate.
     * The default value is: "Signed by [Signer first name] [Signer last name]".
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'height' => ['height', 'getHeight', 'setHeight'], 'width' => ['width', 'getWidth', 'setWidth'], 'reason' => ['reason', 'getReason', 'setReason']];
    }
}
