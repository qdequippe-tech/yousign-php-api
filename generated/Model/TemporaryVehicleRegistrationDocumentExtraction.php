<?php

namespace Qdequippe\Yousign\Api\Model;

class TemporaryVehicleRegistrationDocumentExtraction
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
     * Vehicle category extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleCategory;
    /**
     * Vehicle license plate number extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleLicenseNumber;
    /**
     * Vehicle identification number (VIN) extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleIdentificationNumber;
    /**
     * Vehicle purpose extracted from the document.
     *
     * @var string|null
     */
    protected $vehiclePurpose;
    /**
     * Year of the vehicle's first registration extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleFirstRegistrationYear;
    /**
     * Vehicle owner information extracted from the document.
     *
     * @var TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation|null
     */
    protected $vehicleOwnerInformation;
    /**
     * Other details extracted from the document.
     *
     * @var string|null
     */
    protected $otherDetails;
    /**
     * Issuance date extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Document reason extracted from the document.
     *
     * @var string|null
     */
    protected $documentReason;
    /**
     * Document recipient information extracted from the document.
     *
     * @var TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation|null
     */
    protected $documentRecipientInformation;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Vehicle category extracted from the document.
     */
    public function getVehicleCategory(): ?string
    {
        return $this->vehicleCategory;
    }

    /**
     * Vehicle category extracted from the document.
     */
    public function setVehicleCategory(?string $vehicleCategory): self
    {
        $this->initialized['vehicleCategory'] = true;
        $this->vehicleCategory = $vehicleCategory;

        return $this;
    }

    /**
     * Vehicle license plate number extracted from the document.
     */
    public function getVehicleLicenseNumber(): ?string
    {
        return $this->vehicleLicenseNumber;
    }

    /**
     * Vehicle license plate number extracted from the document.
     */
    public function setVehicleLicenseNumber(?string $vehicleLicenseNumber): self
    {
        $this->initialized['vehicleLicenseNumber'] = true;
        $this->vehicleLicenseNumber = $vehicleLicenseNumber;

        return $this;
    }

    /**
     * Vehicle identification number (VIN) extracted from the document.
     */
    public function getVehicleIdentificationNumber(): ?string
    {
        return $this->vehicleIdentificationNumber;
    }

    /**
     * Vehicle identification number (VIN) extracted from the document.
     */
    public function setVehicleIdentificationNumber(?string $vehicleIdentificationNumber): self
    {
        $this->initialized['vehicleIdentificationNumber'] = true;
        $this->vehicleIdentificationNumber = $vehicleIdentificationNumber;

        return $this;
    }

    /**
     * Vehicle purpose extracted from the document.
     */
    public function getVehiclePurpose(): ?string
    {
        return $this->vehiclePurpose;
    }

    /**
     * Vehicle purpose extracted from the document.
     */
    public function setVehiclePurpose(?string $vehiclePurpose): self
    {
        $this->initialized['vehiclePurpose'] = true;
        $this->vehiclePurpose = $vehiclePurpose;

        return $this;
    }

    /**
     * Year of the vehicle's first registration extracted from the document.
     */
    public function getVehicleFirstRegistrationYear(): ?string
    {
        return $this->vehicleFirstRegistrationYear;
    }

    /**
     * Year of the vehicle's first registration extracted from the document.
     */
    public function setVehicleFirstRegistrationYear(?string $vehicleFirstRegistrationYear): self
    {
        $this->initialized['vehicleFirstRegistrationYear'] = true;
        $this->vehicleFirstRegistrationYear = $vehicleFirstRegistrationYear;

        return $this;
    }

    /**
     * Vehicle owner information extracted from the document.
     */
    public function getVehicleOwnerInformation(): ?TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation
    {
        return $this->vehicleOwnerInformation;
    }

    /**
     * Vehicle owner information extracted from the document.
     */
    public function setVehicleOwnerInformation(?TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation $vehicleOwnerInformation): self
    {
        $this->initialized['vehicleOwnerInformation'] = true;
        $this->vehicleOwnerInformation = $vehicleOwnerInformation;

        return $this;
    }

    /**
     * Other details extracted from the document.
     */
    public function getOtherDetails(): ?string
    {
        return $this->otherDetails;
    }

    /**
     * Other details extracted from the document.
     */
    public function setOtherDetails(?string $otherDetails): self
    {
        $this->initialized['otherDetails'] = true;
        $this->otherDetails = $otherDetails;

        return $this;
    }

    /**
     * Issuance date extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * Issuance date extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * Document reason extracted from the document.
     */
    public function getDocumentReason(): ?string
    {
        return $this->documentReason;
    }

    /**
     * Document reason extracted from the document.
     */
    public function setDocumentReason(?string $documentReason): self
    {
        $this->initialized['documentReason'] = true;
        $this->documentReason = $documentReason;

        return $this;
    }

    /**
     * Document recipient information extracted from the document.
     */
    public function getDocumentRecipientInformation(): ?TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation
    {
        return $this->documentRecipientInformation;
    }

    /**
     * Document recipient information extracted from the document.
     */
    public function setDocumentRecipientInformation(?TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation $documentRecipientInformation): self
    {
        $this->initialized['documentRecipientInformation'] = true;
        $this->documentRecipientInformation = $documentRecipientInformation;

        return $this;
    }

    /**
     * Classification label extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Classification label extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
