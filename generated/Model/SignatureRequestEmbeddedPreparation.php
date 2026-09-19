<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignatureRequestEmbeddedPreparation implements AdditionalPropertiesInterface
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
     * Redirect URLs for the Embedded Preparation navigation buttons.
     *
     * @var SignatureRequestEmbeddedPreparationRedirectUrls|null
     */
    protected $redirectUrls;

    /**
     * Redirect URLs for the Embedded Preparation navigation buttons.
     */
    public function getRedirectUrls(): ?SignatureRequestEmbeddedPreparationRedirectUrls
    {
        return $this->redirectUrls;
    }

    /**
     * Redirect URLs for the Embedded Preparation navigation buttons.
     */
    public function setRedirectUrls(?SignatureRequestEmbeddedPreparationRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['redirectUrls' => ['redirect_urls', 'getRedirectUrls', 'setRedirectUrls']];
    }
}
