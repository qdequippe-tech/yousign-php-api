<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BankAccountLookupFullDataExtractedFromDocument implements AdditionalPropertiesInterface
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
     * The IBAN number extracted from the document.
     *
     * @var string|null
     */
    protected $iban;

    /**
     * The IBAN number extracted from the document.
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * The IBAN number extracted from the document.
     */
    public function setIban(?string $iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iban' => ['iban', 'getIban', 'setIban']];
    }
}
