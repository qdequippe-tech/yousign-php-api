<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateNaturalPerson
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
     * Describes the Applicant.
     *
     * @var Identity|null
     */
    protected $identity;
    /**
     * Provide the Applicants full address.
     *
     * @var Address|null
     */
    protected $address;
    /**
     * Bank account details.
     *
     * @var BankAccount|null
     */
    protected $bankAccount;

    /**
     * Describes the Applicant.
     */
    public function getIdentity(): ?Identity
    {
        return $this->identity;
    }

    /**
     * Describes the Applicant.
     */
    public function setIdentity(?Identity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

        return $this;
    }

    /**
     * Provide the Applicants full address.
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Provide the Applicants full address.
     */
    public function setAddress(?Address $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }

    /**
     * Bank account details.
     */
    public function getBankAccount(): ?BankAccount
    {
        return $this->bankAccount;
    }

    /**
     * Bank account details.
     */
    public function setBankAccount(?BankAccount $bankAccount): self
    {
        $this->initialized['bankAccount'] = true;
        $this->bankAccount = $bankAccount;

        return $this;
    }
}
