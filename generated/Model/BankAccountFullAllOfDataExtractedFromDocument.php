<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BankAccountFullAllOfDataExtractedFromDocument implements AdditionalPropertiesInterface
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
     * International Bank Account Number (IBAN).
     *
     * @var string|null
     */
    protected $iban;
    /**
     * Business Identifier Codes (BIC).
     *
     * @var string|null
     */
    protected $bic;

    /**
     * International Bank Account Number (IBAN).
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * International Bank Account Number (IBAN).
     */
    public function setIban(?string $iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    /**
     * Business Identifier Codes (BIC).
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * Business Identifier Codes (BIC).
     */
    public function setBic(?string $bic): self
    {
        $this->initialized['bic'] = true;
        $this->bic = $bic;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iban' => ['iban', 'getIban', 'setIban'], 'bic' => ['bic', 'getBic', 'setBic']];
    }
}
