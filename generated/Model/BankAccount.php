<?php

namespace Qdequippe\Yousign\Api\Model;

class BankAccount
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
     * International Bank Account Number.
     *
     * @var string|null
     */
    protected $iban;
    /**
     * Business Identifier Code.
     *
     * @var string|null
     */
    protected $bic;

    /**
     * International Bank Account Number.
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * International Bank Account Number.
     */
    public function setIban(?string $iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    /**
     * Business Identifier Code.
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * Business Identifier Code.
     */
    public function setBic(?string $bic): self
    {
        $this->initialized['bic'] = true;
        $this->bic = $bic;

        return $this;
    }
}
