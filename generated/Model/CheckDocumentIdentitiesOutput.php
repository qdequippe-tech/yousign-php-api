<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class CheckDocumentIdentitiesOutput
{
    /**
     * Id of the object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * List of firstnames to check on document.
     *
     * @var string[]|null
     */
    protected $firstNames;
    /**
     * Birth name to check on document.
     *
     * @var string|null
     */
    protected $birthName;
    /**
     * Birth date to check on document.
     *
     * @var \DateTime|null
     */
    protected $birthDate;
    /**
     * workspace creator of the object.
     *
     * @var string|null
     */
    protected $workspace;
    /**
     * Creator of the object.
     *
     * @var string|null
     */
    protected $creator;
    /**
     * Type of document.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Extracted firstnames on the document.
     *
     * @var string[]|null
     */
    protected $extractedFirstNames;
    /**
     * Extracted birth name on the document.
     *
     * @var string|null
     */
    protected $extractedBirthName;
    /**
     * Extracted birth date on the document.
     *
     * @var \DateTime|null
     */
    protected $extractedBirthDate;
    /**
     * Extracted gender on the document.
     *
     * @var string|null
     */
    protected $extractedGender;
    /**
     * Extracted issuance date on the document.
     *
     * @var \DateTime|null
     */
    protected $extractedIssuanceDate;
    /**
     * Extracted expiration date on the document.
     *
     * @var \DateTime|null
     */
    protected $extractedExpirationDate;
    /**
     * Extracted MRZ on the document.
     *
     * @var string[]|null
     */
    protected $extractedMrz;
    /**
     * Defines if one firstname sent in the input is valid.
     *
     * @var bool|null
     */
    protected $firstNameValid;
    /**
     * Defines if birth name sent in the input is valid.
     *
     * @var bool|null
     */
    protected $birthNameValid;
    /**
     * Defines if MRZ sent in the input is valid.
     *
     * @var bool|null
     */
    protected $mrzValid;
    /**
     * Defines if the document is expired.
     *
     * @var bool|null
     */
    protected $expired;
    /**
     * Defines if the document is valid.
     *
     * @var bool|null
     */
    protected $valid;

    /**
     * Id of the object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Id of the object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * List of firstnames to check on document.
     *
     * @return string[]|null
     */
    public function getFirstNames(): ?array
    {
        return $this->firstNames;
    }

    /**
     * List of firstnames to check on document.
     *
     * @param string[]|null $firstNames
     */
    public function setFirstNames(?array $firstNames): self
    {
        $this->firstNames = $firstNames;

        return $this;
    }

    /**
     * Birth name to check on document.
     */
    public function getBirthName(): ?string
    {
        return $this->birthName;
    }

    /**
     * Birth name to check on document.
     */
    public function setBirthName(?string $birthName): self
    {
        $this->birthName = $birthName;

        return $this;
    }

    /**
     * Birth date to check on document.
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * Birth date to check on document.
     */
    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * workspace creator of the object.
     */
    public function getWorkspace(): ?string
    {
        return $this->workspace;
    }

    /**
     * workspace creator of the object.
     */
    public function setWorkspace(?string $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }

    /**
     * Creator of the object.
     */
    public function getCreator(): ?string
    {
        return $this->creator;
    }

    /**
     * Creator of the object.
     */
    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Type of document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Type of document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Extracted firstnames on the document.
     *
     * @return string[]|null
     */
    public function getExtractedFirstNames(): ?array
    {
        return $this->extractedFirstNames;
    }

    /**
     * Extracted firstnames on the document.
     *
     * @param string[]|null $extractedFirstNames
     */
    public function setExtractedFirstNames(?array $extractedFirstNames): self
    {
        $this->extractedFirstNames = $extractedFirstNames;

        return $this;
    }

    /**
     * Extracted birth name on the document.
     */
    public function getExtractedBirthName(): ?string
    {
        return $this->extractedBirthName;
    }

    /**
     * Extracted birth name on the document.
     */
    public function setExtractedBirthName(?string $extractedBirthName): self
    {
        $this->extractedBirthName = $extractedBirthName;

        return $this;
    }

    /**
     * Extracted birth date on the document.
     */
    public function getExtractedBirthDate(): ?\DateTime
    {
        return $this->extractedBirthDate;
    }

    /**
     * Extracted birth date on the document.
     */
    public function setExtractedBirthDate(?\DateTime $extractedBirthDate): self
    {
        $this->extractedBirthDate = $extractedBirthDate;

        return $this;
    }

    /**
     * Extracted gender on the document.
     */
    public function getExtractedGender(): ?string
    {
        return $this->extractedGender;
    }

    /**
     * Extracted gender on the document.
     */
    public function setExtractedGender(?string $extractedGender): self
    {
        $this->extractedGender = $extractedGender;

        return $this;
    }

    /**
     * Extracted issuance date on the document.
     */
    public function getExtractedIssuanceDate(): ?\DateTime
    {
        return $this->extractedIssuanceDate;
    }

    /**
     * Extracted issuance date on the document.
     */
    public function setExtractedIssuanceDate(?\DateTime $extractedIssuanceDate): self
    {
        $this->extractedIssuanceDate = $extractedIssuanceDate;

        return $this;
    }

    /**
     * Extracted expiration date on the document.
     */
    public function getExtractedExpirationDate(): ?\DateTime
    {
        return $this->extractedExpirationDate;
    }

    /**
     * Extracted expiration date on the document.
     */
    public function setExtractedExpirationDate(?\DateTime $extractedExpirationDate): self
    {
        $this->extractedExpirationDate = $extractedExpirationDate;

        return $this;
    }

    /**
     * Extracted MRZ on the document.
     *
     * @return string[]|null
     */
    public function getExtractedMrz(): ?array
    {
        return $this->extractedMrz;
    }

    /**
     * Extracted MRZ on the document.
     *
     * @param string[]|null $extractedMrz
     */
    public function setExtractedMrz(?array $extractedMrz): self
    {
        $this->extractedMrz = $extractedMrz;

        return $this;
    }

    /**
     * Defines if one firstname sent in the input is valid.
     */
    public function getFirstNameValid(): ?bool
    {
        return $this->firstNameValid;
    }

    /**
     * Defines if one firstname sent in the input is valid.
     */
    public function setFirstNameValid(?bool $firstNameValid): self
    {
        $this->firstNameValid = $firstNameValid;

        return $this;
    }

    /**
     * Defines if birth name sent in the input is valid.
     */
    public function getBirthNameValid(): ?bool
    {
        return $this->birthNameValid;
    }

    /**
     * Defines if birth name sent in the input is valid.
     */
    public function setBirthNameValid(?bool $birthNameValid): self
    {
        $this->birthNameValid = $birthNameValid;

        return $this;
    }

    /**
     * Defines if MRZ sent in the input is valid.
     */
    public function getMrzValid(): ?bool
    {
        return $this->mrzValid;
    }

    /**
     * Defines if MRZ sent in the input is valid.
     */
    public function setMrzValid(?bool $mrzValid): self
    {
        $this->mrzValid = $mrzValid;

        return $this;
    }

    /**
     * Defines if the document is expired.
     */
    public function getExpired(): ?bool
    {
        return $this->expired;
    }

    /**
     * Defines if the document is expired.
     */
    public function setExpired(?bool $expired): self
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Defines if the document is valid.
     */
    public function getValid(): ?bool
    {
        return $this->valid;
    }

    /**
     * Defines if the document is valid.
     */
    public function setValid(?bool $valid): self
    {
        $this->valid = $valid;

        return $this;
    }
}
