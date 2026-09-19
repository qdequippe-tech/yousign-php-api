<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UploadElectronicSealImage implements AdditionalPropertiesInterface
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
     * Seal Image to be displayed on a sealed Document. Accepted formats: PNG/JPG/GIF, max 500 Ko.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * Name of the Seal Image.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $name;

    /**
     * Seal Image to be displayed on a sealed Document. Accepted formats: PNG/JPG/GIF, max 500 Ko.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Seal Image to be displayed on a sealed Document. Accepted formats: PNG/JPG/GIF, max 500 Ko.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Name of the Seal Image.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Seal Image.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile'], 'name' => ['name', 'getName', 'setName']];
    }
}
