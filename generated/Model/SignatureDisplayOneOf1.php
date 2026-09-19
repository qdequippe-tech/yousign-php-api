<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureDisplayOneOf1 implements AdditionalPropertiesInterface
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
     * • `minimal` (default): Only shows the signer’s signature visual.
     * • `detailed`: Adds extra detail to the signature field, including the signer’s full name, email, and the date of signature.
     *
     * @var string|null
     */
    protected $layout;
    /**
     * Only applicable when `display.layout = detailed`.
     *
     * @var SignatureDisplayOneOf1Options|null
     */
    protected $options;

    /**
     * • `minimal` (default): Only shows the signer’s signature visual.
     * • `detailed`: Adds extra detail to the signature field, including the signer’s full name, email, and the date of signature.
     */
    public function getLayout(): ?string
    {
        return $this->layout;
    }

    /**
     * • `minimal` (default): Only shows the signer’s signature visual.
     * • `detailed`: Adds extra detail to the signature field, including the signer’s full name, email, and the date of signature.
     */
    public function setLayout(?string $layout): self
    {
        $this->initialized['layout'] = true;
        $this->layout = $layout;

        return $this;
    }

    /**
     * Only applicable when `display.layout = detailed`.
     */
    public function getOptions(): ?SignatureDisplayOneOf1Options
    {
        return $this->options;
    }

    /**
     * Only applicable when `display.layout = detailed`.
     */
    public function setOptions(?SignatureDisplayOneOf1Options $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['layout' => ['layout', 'getLayout', 'setLayout'], 'options' => ['options', 'getOptions', 'setOptions']];
    }
}
