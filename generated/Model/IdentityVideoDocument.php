<?php

namespace Qdequippe\Yousign\Api\Model;

class IdentityVideoDocument
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
     * Full name of the document holder as it appears on the identity document.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Date of birth on the document.
     *
     * @var \DateTime|null
     */
    protected $bornOn;
    /**
     * Type of document.
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $issuingCountryCode;
    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/video-based-identity-verification) for more details and examples.
     *
     * @var string|null
     */
    protected $nationalIdentificationNumber;

    /**
     * Full name of the document holder as it appears on the identity document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name of the document holder as it appears on the identity document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Date of birth on the document.
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * Date of birth on the document.
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * Type of document.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of document.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getIssuingCountryCode(): ?string
    {
        return $this->issuingCountryCode;
    }

    public function setIssuingCountryCode(?string $issuingCountryCode): self
    {
        $this->initialized['issuingCountryCode'] = true;
        $this->issuingCountryCode = $issuingCountryCode;

        return $this;
    }

    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/video-based-identity-verification) for more details and examples.
     */
    public function getNationalIdentificationNumber(): ?string
    {
        return $this->nationalIdentificationNumber;
    }

    /**
     * Some documents may contain a national identification number.
     * For example, Italian ID cards contain the Codice Fiscale on the back of the document.
     * When this data is available on the document, it will be returned here, otherwise it will be NULL.
     * Consult our [guide](https://developers.youtrust.com/docs/video-based-identity-verification) for more details and examples.
     */
    public function setNationalIdentificationNumber(?string $nationalIdentificationNumber): self
    {
        $this->initialized['nationalIdentificationNumber'] = true;
        $this->nationalIdentificationNumber = $nationalIdentificationNumber;

        return $this;
    }
}
