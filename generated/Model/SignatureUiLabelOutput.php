<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class SignatureUiLabelOutput
{
    /**
     * Resource's ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Name of the label. If the name is not used in the view, nothing will appear.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Translation of the label per language.
     *
     * @var mixed|null
     */
    protected $languages;
    /**
     * Associated signature UI's ID.
     *
     * @var string|null
     */
    protected $signatureUi;
    /**
     * Creator's ID.
     *
     * @var string|null
     */
    protected $creator;
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
     * Resource's ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Resource's ID.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the label. If the name is not used in the view, nothing will appear.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the label. If the name is not used in the view, nothing will appear.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Translation of the label per language.
     *
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Translation of the label per language.
     *
     * @param mixed $languages
     */
    public function setLanguages($languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Associated signature UI's ID.
     */
    public function getSignatureUi(): ?string
    {
        return $this->signatureUi;
    }

    /**
     * Associated signature UI's ID.
     */
    public function setSignatureUi(?string $signatureUi): self
    {
        $this->signatureUi = $signatureUi;

        return $this;
    }

    /**
     * Creator's ID.
     */
    public function getCreator(): ?string
    {
        return $this->creator;
    }

    /**
     * Creator's ID.
     */
    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

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
}
