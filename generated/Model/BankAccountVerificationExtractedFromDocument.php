<?php

namespace Qdequippe\Yousign\Api\Model;

class BankAccountVerificationExtractedFromDocument extends \ArrayObject
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
     * @var string|string|null
     */
    protected $iban;
    /**
     * @var string|string|null
     */
    protected $bic;

    /**
     * @return string|string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string|string|null $iban
     */
    public function setIban($iban): self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;

        return $this;
    }

    /**
     * @return string|string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string|string|null $bic
     */
    public function setBic($bic): self
    {
        $this->initialized['bic'] = true;
        $this->bic = $bic;

        return $this;
    }
}
