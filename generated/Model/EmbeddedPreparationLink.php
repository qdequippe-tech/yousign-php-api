<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class EmbeddedPreparationLink implements AdditionalPropertiesInterface
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
     * Short-lived URL opening the Signature Request Embedded Preparation. Expires after 10 minutes.
     *
     * @var string|null
     */
    protected $url;

    /**
     * Short-lived URL opening the Signature Request Embedded Preparation. Expires after 10 minutes.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Short-lived URL opening the Signature Request Embedded Preparation. Expires after 10 minutes.
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['url' => ['url', 'getUrl', 'setUrl']];
    }
}
