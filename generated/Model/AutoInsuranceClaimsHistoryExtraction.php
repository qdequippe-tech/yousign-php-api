<?php

namespace Qdequippe\Yousign\Api\Model;

class AutoInsuranceClaimsHistoryExtraction
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
     * Full name of the policy holder extracted from the document.
     *
     * @var string|null
     */
    protected $policyHolderFullName;
    /**
     * Address of the policy holder extracted from the document.
     *
     * @var string|null
     */
    protected $policyHolderAddress;
    /**
     * Birth date of the policy holder extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $policyHolderBirthDate;
    /**
     * Insurance score (bonus/malus coefficient) extracted from the document.
     *
     * @var string|null
     */
    protected $insuranceScore;
    /**
     * Issuance date of the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Effective start date of the insurance contract.
     *
     * @var \DateTime|null
     */
    protected $effectiveStartDate;
    /**
     * Whether the insurance contract is currently active.
     *
     * @var bool|null
     */
    protected $activeContract;
    /**
     * Cancellation date of the insurance contract, if applicable.
     *
     * @var \DateTime|null
     */
    protected $contractCancellationDate;
    /**
     * Model of the insured vehicle extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleModel;
    /**
     * License plate number of the insured vehicle extracted from the document.
     *
     * @var string|null
     */
    protected $vehicleLicensePlate;
    /**
     * List of drivers covered by the insurance policy.
     *
     * @var list<AutoInsuranceClaimsHistoryExtractionDriversInformationInner>|null
     */
    protected $driversInformation;
    /**
     * List of incidents (claims) recorded in the insurance history.
     *
     * @var list<AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner>|null
     */
    protected $incidentsInformation;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Full name of the policy holder extracted from the document.
     */
    public function getPolicyHolderFullName(): ?string
    {
        return $this->policyHolderFullName;
    }

    /**
     * Full name of the policy holder extracted from the document.
     */
    public function setPolicyHolderFullName(?string $policyHolderFullName): self
    {
        $this->initialized['policyHolderFullName'] = true;
        $this->policyHolderFullName = $policyHolderFullName;

        return $this;
    }

    /**
     * Address of the policy holder extracted from the document.
     */
    public function getPolicyHolderAddress(): ?string
    {
        return $this->policyHolderAddress;
    }

    /**
     * Address of the policy holder extracted from the document.
     */
    public function setPolicyHolderAddress(?string $policyHolderAddress): self
    {
        $this->initialized['policyHolderAddress'] = true;
        $this->policyHolderAddress = $policyHolderAddress;

        return $this;
    }

    /**
     * Birth date of the policy holder extracted from the document.
     */
    public function getPolicyHolderBirthDate(): ?\DateTime
    {
        return $this->policyHolderBirthDate;
    }

    /**
     * Birth date of the policy holder extracted from the document.
     */
    public function setPolicyHolderBirthDate(?\DateTime $policyHolderBirthDate): self
    {
        $this->initialized['policyHolderBirthDate'] = true;
        $this->policyHolderBirthDate = $policyHolderBirthDate;

        return $this;
    }

    /**
     * Insurance score (bonus/malus coefficient) extracted from the document.
     */
    public function getInsuranceScore(): ?string
    {
        return $this->insuranceScore;
    }

    /**
     * Insurance score (bonus/malus coefficient) extracted from the document.
     */
    public function setInsuranceScore(?string $insuranceScore): self
    {
        $this->initialized['insuranceScore'] = true;
        $this->insuranceScore = $insuranceScore;

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
     * Effective start date of the insurance contract.
     */
    public function getEffectiveStartDate(): ?\DateTime
    {
        return $this->effectiveStartDate;
    }

    /**
     * Effective start date of the insurance contract.
     */
    public function setEffectiveStartDate(?\DateTime $effectiveStartDate): self
    {
        $this->initialized['effectiveStartDate'] = true;
        $this->effectiveStartDate = $effectiveStartDate;

        return $this;
    }

    /**
     * Whether the insurance contract is currently active.
     */
    public function getActiveContract(): ?bool
    {
        return $this->activeContract;
    }

    /**
     * Whether the insurance contract is currently active.
     */
    public function setActiveContract(?bool $activeContract): self
    {
        $this->initialized['activeContract'] = true;
        $this->activeContract = $activeContract;

        return $this;
    }

    /**
     * Cancellation date of the insurance contract, if applicable.
     */
    public function getContractCancellationDate(): ?\DateTime
    {
        return $this->contractCancellationDate;
    }

    /**
     * Cancellation date of the insurance contract, if applicable.
     */
    public function setContractCancellationDate(?\DateTime $contractCancellationDate): self
    {
        $this->initialized['contractCancellationDate'] = true;
        $this->contractCancellationDate = $contractCancellationDate;

        return $this;
    }

    /**
     * Model of the insured vehicle extracted from the document.
     */
    public function getVehicleModel(): ?string
    {
        return $this->vehicleModel;
    }

    /**
     * Model of the insured vehicle extracted from the document.
     */
    public function setVehicleModel(?string $vehicleModel): self
    {
        $this->initialized['vehicleModel'] = true;
        $this->vehicleModel = $vehicleModel;

        return $this;
    }

    /**
     * License plate number of the insured vehicle extracted from the document.
     */
    public function getVehicleLicensePlate(): ?string
    {
        return $this->vehicleLicensePlate;
    }

    /**
     * License plate number of the insured vehicle extracted from the document.
     */
    public function setVehicleLicensePlate(?string $vehicleLicensePlate): self
    {
        $this->initialized['vehicleLicensePlate'] = true;
        $this->vehicleLicensePlate = $vehicleLicensePlate;

        return $this;
    }

    /**
     * List of drivers covered by the insurance policy.
     *
     * @return list<AutoInsuranceClaimsHistoryExtractionDriversInformationInner>|null
     */
    public function getDriversInformation(): ?array
    {
        return $this->driversInformation;
    }

    /**
     * List of drivers covered by the insurance policy.
     *
     * @param list<AutoInsuranceClaimsHistoryExtractionDriversInformationInner>|null $driversInformation
     */
    public function setDriversInformation(?array $driversInformation): self
    {
        $this->initialized['driversInformation'] = true;
        $this->driversInformation = $driversInformation;

        return $this;
    }

    /**
     * List of incidents (claims) recorded in the insurance history.
     *
     * @return list<AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner>|null
     */
    public function getIncidentsInformation(): ?array
    {
        return $this->incidentsInformation;
    }

    /**
     * List of incidents (claims) recorded in the insurance history.
     *
     * @param list<AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner>|null $incidentsInformation
     */
    public function setIncidentsInformation(?array $incidentsInformation): self
    {
        $this->initialized['incidentsInformation'] = true;
        $this->incidentsInformation = $incidentsInformation;

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
