<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianVehicleRegistrationDocumentExtraction
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
     * @var ItalianVehicleRegistrationDocumentExtractionOwnerInformation|null
     */
    protected $ownerInformation;
    /**
     * List of co-owners of the vehicle.
     *
     * @var list<FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner>|null
     */
    protected $coOwnerInformation;
    /**
     * List of deed informations related to the vehicle.
     *
     * @var list<ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner>|null
     */
    protected $deedInformations;
    /**
     * @var FrenchVehicleRegistrationDocumentExtractionVehicleInformation|null
     */
    protected $vehicleInformation;
    /**
     * Body type of the vehicle.
     *
     * @var string|null
     */
    protected $vehicleBody;
    /**
     * Vehicle Identification Number (VIN).
     *
     * @var string|null
     */
    protected $vehicleIdentificationNumber;
    /**
     * Total mass of the vehicle.
     *
     * @var float|null
     */
    protected $vehicleTotalMass;
    /**
     * @var ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation|null
     */
    protected $vehicleMotorInformation;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * Issuance date of the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Vehicle approval number.
     *
     * @var string|null
     */
    protected $vehicleApprovalNumber;
    /**
     * Destination and use of the vehicle.
     *
     * @var string|null
     */
    protected $vehicleDestinationAndUse;
    /**
     * International vehicle category.
     *
     * @var string|null
     */
    protected $internationalVehicleCategory;
    /**
     * Mass of the vehicle in service.
     *
     * @var float|null
     */
    protected $massOfTheVehicleInService;
    /**
     * Maximum technical mass of the vehicle.
     *
     * @var float|null
     */
    protected $vehicleMaximumTechnicalMass;
    /**
     * Maximum permissible mass of the vehicle.
     *
     * @var float|null
     */
    protected $vehicleMaximumPermissibleMass;

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

    public function getOwnerInformation(): ?ItalianVehicleRegistrationDocumentExtractionOwnerInformation
    {
        return $this->ownerInformation;
    }

    public function setOwnerInformation(?ItalianVehicleRegistrationDocumentExtractionOwnerInformation $ownerInformation): self
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

    /**
     * List of deed informations related to the vehicle.
     *
     * @return list<ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner>|null
     */
    public function getDeedInformations(): ?array
    {
        return $this->deedInformations;
    }

    /**
     * List of deed informations related to the vehicle.
     *
     * @param list<ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner>|null $deedInformations
     */
    public function setDeedInformations(?array $deedInformations): self
    {
        $this->initialized['deedInformations'] = true;
        $this->deedInformations = $deedInformations;

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
     * Body type of the vehicle.
     */
    public function getVehicleBody(): ?string
    {
        return $this->vehicleBody;
    }

    /**
     * Body type of the vehicle.
     */
    public function setVehicleBody(?string $vehicleBody): self
    {
        $this->initialized['vehicleBody'] = true;
        $this->vehicleBody = $vehicleBody;

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
     * Total mass of the vehicle.
     */
    public function getVehicleTotalMass(): ?float
    {
        return $this->vehicleTotalMass;
    }

    /**
     * Total mass of the vehicle.
     */
    public function setVehicleTotalMass(?float $vehicleTotalMass): self
    {
        $this->initialized['vehicleTotalMass'] = true;
        $this->vehicleTotalMass = $vehicleTotalMass;

        return $this;
    }

    public function getVehicleMotorInformation(): ?ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation
    {
        return $this->vehicleMotorInformation;
    }

    public function setVehicleMotorInformation(?ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation $vehicleMotorInformation): self
    {
        $this->initialized['vehicleMotorInformation'] = true;
        $this->vehicleMotorInformation = $vehicleMotorInformation;

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
     * Vehicle approval number.
     */
    public function getVehicleApprovalNumber(): ?string
    {
        return $this->vehicleApprovalNumber;
    }

    /**
     * Vehicle approval number.
     */
    public function setVehicleApprovalNumber(?string $vehicleApprovalNumber): self
    {
        $this->initialized['vehicleApprovalNumber'] = true;
        $this->vehicleApprovalNumber = $vehicleApprovalNumber;

        return $this;
    }

    /**
     * Destination and use of the vehicle.
     */
    public function getVehicleDestinationAndUse(): ?string
    {
        return $this->vehicleDestinationAndUse;
    }

    /**
     * Destination and use of the vehicle.
     */
    public function setVehicleDestinationAndUse(?string $vehicleDestinationAndUse): self
    {
        $this->initialized['vehicleDestinationAndUse'] = true;
        $this->vehicleDestinationAndUse = $vehicleDestinationAndUse;

        return $this;
    }

    /**
     * International vehicle category.
     */
    public function getInternationalVehicleCategory(): ?string
    {
        return $this->internationalVehicleCategory;
    }

    /**
     * International vehicle category.
     */
    public function setInternationalVehicleCategory(?string $internationalVehicleCategory): self
    {
        $this->initialized['internationalVehicleCategory'] = true;
        $this->internationalVehicleCategory = $internationalVehicleCategory;

        return $this;
    }

    /**
     * Mass of the vehicle in service.
     */
    public function getMassOfTheVehicleInService(): ?float
    {
        return $this->massOfTheVehicleInService;
    }

    /**
     * Mass of the vehicle in service.
     */
    public function setMassOfTheVehicleInService(?float $massOfTheVehicleInService): self
    {
        $this->initialized['massOfTheVehicleInService'] = true;
        $this->massOfTheVehicleInService = $massOfTheVehicleInService;

        return $this;
    }

    /**
     * Maximum technical mass of the vehicle.
     */
    public function getVehicleMaximumTechnicalMass(): ?float
    {
        return $this->vehicleMaximumTechnicalMass;
    }

    /**
     * Maximum technical mass of the vehicle.
     */
    public function setVehicleMaximumTechnicalMass(?float $vehicleMaximumTechnicalMass): self
    {
        $this->initialized['vehicleMaximumTechnicalMass'] = true;
        $this->vehicleMaximumTechnicalMass = $vehicleMaximumTechnicalMass;

        return $this;
    }

    /**
     * Maximum permissible mass of the vehicle.
     */
    public function getVehicleMaximumPermissibleMass(): ?float
    {
        return $this->vehicleMaximumPermissibleMass;
    }

    /**
     * Maximum permissible mass of the vehicle.
     */
    public function setVehicleMaximumPermissibleMass(?float $vehicleMaximumPermissibleMass): self
    {
        $this->initialized['vehicleMaximumPermissibleMass'] = true;
        $this->vehicleMaximumPermissibleMass = $vehicleMaximumPermissibleMass;

        return $this;
    }
}
