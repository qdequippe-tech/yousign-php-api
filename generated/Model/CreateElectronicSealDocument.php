<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateElectronicSealDocument implements AdditionalPropertiesInterface
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
     * Binary file. Accepted formats: PDF.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * The password required to unlock the document if it is protected.
     *
     * @var string|null
     */
    protected $password;

    /**
     * Binary file. Accepted formats: PDF.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Binary file. Accepted formats: PDF.
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
     * The password required to unlock the document if it is protected.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * The password required to unlock the document if it is protected.
     */
    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile'], 'password' => ['password', 'getPassword', 'setPassword']];
    }
}
