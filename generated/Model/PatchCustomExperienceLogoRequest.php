<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class PatchCustomExperienceLogoRequest implements AdditionalPropertiesInterface
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
     * @var string|resource|StreamInterface|null
     */
    protected $file;

    /**
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile']];
    }
}
