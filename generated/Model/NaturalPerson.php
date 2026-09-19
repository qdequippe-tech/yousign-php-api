<?php

namespace Qdequippe\Yousign\Api\Model;

class NaturalPerson
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
     * Identity of the natural person.
     *
     * @var array<string, mixed>|null
     */
    protected $identity;
    /**
     * Postal address of the natural person.
     *
     * @var array<string, mixed>|null
     */
    protected $address;
    /**
     * Bank account of the natural person.
     *
     * @var array<string, mixed>|null
     */
    protected $bankAccount;

    /**
     * Identity of the natural person.
     *
     * @return array<string, mixed>|null
     */
    public function getIdentity(): ?iterable
    {
        return $this->identity;
    }

    /**
     * Identity of the natural person.
     *
     * @param array<string, mixed>|null $identity
     */
    public function setIdentity(?iterable $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

        return $this;
    }

    /**
     * Postal address of the natural person.
     *
     * @return array<string, mixed>|null
     */
    public function getAddress(): ?iterable
    {
        return $this->address;
    }

    /**
     * Postal address of the natural person.
     *
     * @param array<string, mixed>|null $address
     */
    public function setAddress(?iterable $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }

    /**
     * Bank account of the natural person.
     *
     * @return array<string, mixed>|null
     */
    public function getBankAccount(): ?iterable
    {
        return $this->bankAccount;
    }

    /**
     * Bank account of the natural person.
     *
     * @param array<string, mixed>|null $bankAccount
     */
    public function setBankAccount(?iterable $bankAccount): self
    {
        $this->initialized['bankAccount'] = true;
        $this->bankAccount = $bankAccount;

        return $this;
    }
}
