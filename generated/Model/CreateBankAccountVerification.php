<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateBankAccountVerification extends \ArrayObject
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
     * Please provide the holder first name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Please provide the holder last name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Binary file.
     *
     * @var string|null
     */
    protected $file;
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
     * Please provide the holder first name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Please provide the holder first name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the bank account document. Please match it exactly, with the same characters, same case. One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Binary file.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Binary file.
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

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
}
