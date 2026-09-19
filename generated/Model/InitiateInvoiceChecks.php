<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateInvoiceChecks
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
     * Expected buyer name to check against the document.
     * The name of the company in case of a legal person.
     * The full name of the individual in case of a natural person.
     *
     * @var string|null
     */
    protected $buyerName;

    /**
     * Expected buyer name to check against the document.
     * The name of the company in case of a legal person.
     * The full name of the individual in case of a natural person.
     */
    public function getBuyerName(): ?string
    {
        return $this->buyerName;
    }

    /**
     * Expected buyer name to check against the document.
     * The name of the company in case of a legal person.
     * The full name of the individual in case of a natural person.
     */
    public function setBuyerName(?string $buyerName): self
    {
        $this->initialized['buyerName'] = true;
        $this->buyerName = $buyerName;

        return $this;
    }
}
