<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class IdentityDocumentFullAllOfDataExtractedFromDocument implements AdditionalPropertiesInterface
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
     * The document holder's first name as it appears on the identity document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The document holder's birth name (family name at birth).
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * The document holder's current last name (may differ from birth name).
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The document holder's date of birth as it appears on the document.
     *
     * @var \DateTime|null
     */
    protected $bornOn;
    /**
     * The holder's place of birth as it appears on the document.
     *
     * @var string|null
     */
    protected $birthLocation;
    /**
     * The holder's gender as it appears on the document. "m" for Male, "f" for Female, "x" for Non-binary or unspecified.
     *
     * @var string|null
     */
    protected $gender;
    /**
     * The holder's complete postal address as it appears on the document.
     *
     * @var string|null
     */
    protected $fullAddress;
    /**
     * The type of identity document that was verified.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The country that issued the document (ISO 3166-1 alpha-2 code).
     *
     * @var string|null
     */
    protected $issuingCountryCode;
    /**
     * The date when the document was issued.
     *
     * @var \DateTime|null
     */
    protected $issuedOn;
    /**
     * The date when the document legally expires.
     *
     * @var \DateTime|null
     */
    protected $expiredOn;
    /**
     * Document identifier number (may contain letters).
     *
     * @var string|null
     */
    protected $documentNumber;
    /**
     * Machine Readable Zone content.
     *
     * @var IdentityDocumentFullAllOfDataExtractedFromDocumentMrz|null
     */
    protected $mrz;
    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/identity-document-verification) for more details and examples.
     *
     * @var string|null
     */
    protected $nationalIdentificationNumber;

    /**
     * The document holder's first name as it appears on the identity document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The document holder's first name as it appears on the identity document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The document holder's birth name (family name at birth).
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * The document holder's birth name (family name at birth).
     */
    public function setBirthName(?string $birthName): self
    {
        $this->initialized['birthName'] = true;
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * The document holder's current last name (may differ from birth name).
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The document holder's current last name (may differ from birth name).
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The document holder's date of birth as it appears on the document.
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * The document holder's date of birth as it appears on the document.
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * The holder's place of birth as it appears on the document.
     */
    public function getBirthLocation(): ?string
    {
        return $this->birthLocation;
    }

    /**
     * The holder's place of birth as it appears on the document.
     */
    public function setBirthLocation(?string $birthLocation): self
    {
        $this->initialized['birthLocation'] = true;
        $this->birthLocation = $birthLocation;

        return $this;
    }

    /**
     * The holder's gender as it appears on the document. "m" for Male, "f" for Female, "x" for Non-binary or unspecified.
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * The holder's gender as it appears on the document. "m" for Male, "f" for Female, "x" for Non-binary or unspecified.
     */
    public function setGender(?string $gender): self
    {
        $this->initialized['gender'] = true;
        $this->gender = $gender;

        return $this;
    }

    /**
     * The holder's complete postal address as it appears on the document.
     */
    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    /**
     * The holder's complete postal address as it appears on the document.
     */
    public function setFullAddress(?string $fullAddress): self
    {
        $this->initialized['fullAddress'] = true;
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * The type of identity document that was verified.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The type of identity document that was verified.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The country that issued the document (ISO 3166-1 alpha-2 code).
     */
    public function getIssuingCountryCode(): ?string
    {
        return $this->issuingCountryCode;
    }

    /**
     * The country that issued the document (ISO 3166-1 alpha-2 code).
     */
    public function setIssuingCountryCode(?string $issuingCountryCode): self
    {
        $this->initialized['issuingCountryCode'] = true;
        $this->issuingCountryCode = $issuingCountryCode;

        return $this;
    }

    /**
     * The date when the document was issued.
     */
    public function getIssuedOn(): ?\DateTime
    {
        return $this->issuedOn;
    }

    /**
     * The date when the document was issued.
     */
    public function setIssuedOn(?\DateTime $issuedOn): self
    {
        $this->initialized['issuedOn'] = true;
        $this->issuedOn = $issuedOn;

        return $this;
    }

    /**
     * The date when the document legally expires.
     */
    public function getExpiredOn(): ?\DateTime
    {
        return $this->expiredOn;
    }

    /**
     * The date when the document legally expires.
     */
    public function setExpiredOn(?\DateTime $expiredOn): self
    {
        $this->initialized['expiredOn'] = true;
        $this->expiredOn = $expiredOn;

        return $this;
    }

    /**
     * Document identifier number (may contain letters).
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * Document identifier number (may contain letters).
     */
    public function setDocumentNumber(?string $documentNumber): self
    {
        $this->initialized['documentNumber'] = true;
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * Machine Readable Zone content.
     */
    public function getMrz(): ?IdentityDocumentFullAllOfDataExtractedFromDocumentMrz
    {
        return $this->mrz;
    }

    /**
     * Machine Readable Zone content.
     */
    public function setMrz(?IdentityDocumentFullAllOfDataExtractedFromDocumentMrz $mrz): self
    {
        $this->initialized['mrz'] = true;
        $this->mrz = $mrz;

        return $this;
    }

    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/identity-document-verification) for more details and examples.
     */
    public function getNationalIdentificationNumber(): ?string
    {
        return $this->nationalIdentificationNumber;
    }

    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/identity-document-verification) for more details and examples.
     */
    public function setNationalIdentificationNumber(?string $nationalIdentificationNumber): self
    {
        $this->initialized['nationalIdentificationNumber'] = true;
        $this->nationalIdentificationNumber = $nationalIdentificationNumber;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'birthName' => ['birth_name', 'getBirthName', 'setBirthName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'bornOn' => ['born_on', 'getBornOn', 'setBornOn'], 'birthLocation' => ['birth_location', 'getBirthLocation', 'setBirthLocation'], 'gender' => ['gender', 'getGender', 'setGender'], 'fullAddress' => ['full_address', 'getFullAddress', 'setFullAddress'], 'type' => ['type', 'getType', 'setType'], 'issuingCountryCode' => ['issuing_country_code', 'getIssuingCountryCode', 'setIssuingCountryCode'], 'issuedOn' => ['issued_on', 'getIssuedOn', 'setIssuedOn'], 'expiredOn' => ['expired_on', 'getExpiredOn', 'setExpiredOn'], 'documentNumber' => ['document_number', 'getDocumentNumber', 'setDocumentNumber'], 'mrz' => ['mrz', 'getMrz', 'setMrz'], 'nationalIdentificationNumber' => ['national_identification_number', 'getNationalIdentificationNumber', 'setNationalIdentificationNumber']];
    }
}
