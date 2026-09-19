<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo
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
     * Substitute Signer's first name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Substitute Signer's last name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Substitute Signer's email address.
     *
     * @var string|null
     */
    protected $email;
    /**
     * E.164 format. Becomes mandatory if `signature_authentication_mode` requires a phone number.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Locale settings used for communication.
     *
     * @var string|null
     */
    protected $locale;

    /**
     * Substitute Signer's first name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Substitute Signer's first name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Substitute Signer's last name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Substitute Signer's last name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Substitute Signer's email address.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Substitute Signer's email address.
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * E.164 format. Becomes mandatory if `signature_authentication_mode` requires a phone number.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * E.164 format. Becomes mandatory if `signature_authentication_mode` requires a phone number.
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Locale settings used for communication.
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * Locale settings used for communication.
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;

        return $this;
    }
}
