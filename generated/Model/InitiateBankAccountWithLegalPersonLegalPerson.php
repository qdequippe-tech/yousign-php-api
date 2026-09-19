<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateBankAccountWithLegalPersonLegalPerson
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
     * Please provide the legal entity name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Please provide the legal entity name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Please provide the legal entity name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }
}
