<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateSignerConsentRequestSettings implements AdditionalPropertiesInterface
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
     * Text associated to the checkbox or the text_to_copy.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing URL.
     *
     * @var string|null
     */
    protected $text;

    /**
     * Text associated to the checkbox or the text_to_copy.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing URL.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Text associated to the checkbox or the text_to_copy.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing URL.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['text' => ['text', 'getText', 'setText']];
    }
}
