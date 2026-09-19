<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchVehicleRegistrationDocumentExtraction
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
     * Licence plate number of the vehicle.
     *
     * @var string|null
     */
    protected $licencePlateNumber;
    /**
     * Date of first registration of the vehicle.
     *
     * @var \DateTime|null
     */
    protected $firstRegistrationDate;
    /**
     * @var FrenchVehicleRegistrationDocumentExtractionOwnerInformation|null
     */
    protected $ownerInformation;
    /**
     * List of co-owners of the vehicle.
     *
     * @var list<FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner>|null
     */
    protected $coOwnerInformation;
    /**
     * @var FrenchVehicleRegistrationDocumentExtractionVehicleInformation|null
     */
    protected $vehicleInformation;
    /**
     * Vehicle Identification Number (VIN).
     *
     * @var string|null
     */
    protected $vehicleIdentificationNumber;
    /**
     * Maximum weight of the vehicle.
     *
     * @var float|null
     */
    protected $vehicleMaxWeight;
    /**
     * @var FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation|null
     */
    protected $vehicleMotorInformation;
    /**
     * Document number.
     *
     * @var string|null
     */
    protected $documentNumber;
    /**
     * Issuance date of the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Date of the next vehicle inspection.
     *
     * @var \DateTime|null
     */
    protected $vehicleNextInspectionDate;
    /**
     * First line of the Machine Readable Zone (MRZ).
     *
     * @var string|null
     */
    protected $mrzLine1;
    /**
     * Second line of the Machine Readable Zone (MRZ).
     *
     * @var string|null
     */
    protected $mrzLine2;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Licence plate number of the vehicle.
     */
    public function getLicencePlateNumber(): ?string
    {
        return $this->licencePlateNumber;
    }

    /**
     * Licence plate number of the vehicle.
     */
    public function setLicencePlateNumber(?string $licencePlateNumber): self
    {
        $this->initialized['licencePlateNumber'] = true;
        $this->licencePlateNumber = $licencePlateNumber;

        return $this;
    }

    /**
     * Date of first registration of the vehicle.
     */
    public function getFirstRegistrationDate(): ?\DateTime
    {
        return $this->firstRegistrationDate;
    }

    /**
     * Date of first registration of the vehicle.
     */
    public function setFirstRegistrationDate(?\DateTime $firstRegistrationDate): self
    {
        $this->initialized['firstRegistrationDate'] = true;
        $this->firstRegistrationDate = $firstRegistrationDate;

        return $this;
    }

    public function getOwnerInformation(): ?FrenchVehicleRegistrationDocumentExtractionOwnerInformation
    {
        return $this->ownerInformation;
    }

    public function setOwnerInformation(?FrenchVehicleRegistrationDocumentExtractionOwnerInformation $ownerInformation): self
    {
        $this->initialized['ownerInformation'] = true;
        $this->ownerInformation = $ownerInformation;

        return $this;
    }

    /**
     * List of co-owners of the vehicle.
     *
     * @return list<FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner>|null
     */
    public function getCoOwnerInformation(): ?array
    {
        return $this->coOwnerInformation;
    }

    /**
     * List of co-owners of the vehicle.
     *
     * @param list<FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner>|null $coOwnerInformation
     */
    public function setCoOwnerInformation(?array $coOwnerInformation): self
    {
        $this->initialized['coOwnerInformation'] = true;
        $this->coOwnerInformation = $coOwnerInformation;

        return $this;
    }

    public function getVehicleInformation(): ?FrenchVehicleRegistrationDocumentExtractionVehicleInformation
    {
        return $this->vehicleInformation;
    }

    public function setVehicleInformation(?FrenchVehicleRegistrationDocumentExtractionVehicleInformation $vehicleInformation): self
    {
        $this->initialized['vehicleInformation'] = true;
        $this->vehicleInformation = $vehicleInformation;

        return $this;
    }

    /**
     * Vehicle Identification Number (VIN).
     */
    public function getVehicleIdentificationNumber(): ?string
    {
        return $this->vehicleIdentificationNumber;
    }

    /**
     * Vehicle Identification Number (VIN).
     */
    public function setVehicleIdentificationNumber(?string $vehicleIdentificationNumber): self
    {
        $this->initialized['vehicleIdentificationNumber'] = true;
        $this->vehicleIdentificationNumber = $vehicleIdentificationNumber;

        return $this;
    }

    /**
     * Maximum weight of the vehicle.
     */
    public function getVehicleMaxWeight(): ?float
    {
        return $this->vehicleMaxWeight;
    }

    /**
     * Maximum weight of the vehicle.
     */
    public function setVehicleMaxWeight(?float $vehicleMaxWeight): self
    {
        $this->initialized['vehicleMaxWeight'] = true;
        $this->vehicleMaxWeight = $vehicleMaxWeight;

        return $this;
    }

    public function getVehicleMotorInformation(): ?FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation
    {
        return $this->vehicleMotorInformation;
    }

    public function setVehicleMotorInformation(?FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation $vehicleMotorInformation): self
    {
        $this->initialized['vehicleMotorInformation'] = true;
        $this->vehicleMotorInformation = $vehicleMotorInformation;

        return $this;
    }

    /**
     * Document number.
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * Document number.
     */
    public function setDocumentNumber(?string $documentNumber): self
    {
        $this->initialized['documentNumber'] = true;
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * Issuance date of the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * Issuance date of the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * Date of the next vehicle inspection.
     */
    public function getVehicleNextInspectionDate(): ?\DateTime
    {
        return $this->vehicleNextInspectionDate;
    }

    /**
     * Date of the next vehicle inspection.
     */
    public function setVehicleNextInspectionDate(?\DateTime $vehicleNextInspectionDate): self
    {
        $this->initialized['vehicleNextInspectionDate'] = true;
        $this->vehicleNextInspectionDate = $vehicleNextInspectionDate;

        return $this;
    }

    /**
     * First line of the Machine Readable Zone (MRZ).
     */
    public function getMrzLine1(): ?string
    {
        return $this->mrzLine1;
    }

    /**
     * First line of the Machine Readable Zone (MRZ).
     */
    public function setMrzLine1(?string $mrzLine1): self
    {
        $this->initialized['mrzLine1'] = true;
        $this->mrzLine1 = $mrzLine1;

        return $this;
    }

    /**
     * Second line of the Machine Readable Zone (MRZ).
     */
    public function getMrzLine2(): ?string
    {
        return $this->mrzLine2;
    }

    /**
     * Second line of the Machine Readable Zone (MRZ).
     */
    public function setMrzLine2(?string $mrzLine2): self
    {
        $this->initialized['mrzLine2'] = true;
        $this->mrzLine2 = $mrzLine2;

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
