<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateWorkspace
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $name;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $externalName;

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getExternalName(): ?string
    {
        return $this->externalName;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setExternalName(?string $externalName): self
    {
        $this->initialized['externalName'] = true;
        $this->externalName = $externalName;

        return $this;
    }
}
