<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignerInfo implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $firstName;
    /**
     * @var string|null
     */
    protected $lastName;
    /**
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

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

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'email' => ['email', 'getEmail', 'setEmail'], 'phoneNumber' => ['phone_number', 'getPhoneNumber', 'setPhoneNumber'], 'locale' => ['locale', 'getLocale', 'setLocale']];
    }
}
