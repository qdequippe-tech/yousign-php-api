<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class SignatureUiLabelInputIncluded
{
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
}
