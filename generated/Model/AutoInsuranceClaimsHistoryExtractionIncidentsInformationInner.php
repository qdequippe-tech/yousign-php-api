<?php

namespace Qdequippe\Yousign\Api\Model;

class AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner
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
     * Date of the incident.
     *
     * @var \DateTime|null
     */
    protected $incidentDate;
    /**
     * Description of the incident.
     *
     * @var string|null
     */
    protected $incidentDescription;
    /**
     * Type of the incident.
     *
     * @var string|null
     */
    protected $incidentType;
    /**
     * Responsibility level for the incident.
     *
     * @var string|null
     */
    protected $incidentResponsability;
    /**
     * Full name of the driver involved in the incident.
     *
     * @var string|null
     */
    protected $driversFullName;

    /**
     * Date of the incident.
     */
    public function getIncidentDate(): ?\DateTime
    {
        return $this->incidentDate;
    }

    /**
     * Date of the incident.
     */
    public function setIncidentDate(?\DateTime $incidentDate): self
    {
        $this->initialized['incidentDate'] = true;
        $this->incidentDate = $incidentDate;

        return $this;
    }

    /**
     * Description of the incident.
     */
    public function getIncidentDescription(): ?string
    {
        return $this->incidentDescription;
    }

    /**
     * Description of the incident.
     */
    public function setIncidentDescription(?string $incidentDescription): self
    {
        $this->initialized['incidentDescription'] = true;
        $this->incidentDescription = $incidentDescription;

        return $this;
    }

    /**
     * Type of the incident.
     */
    public function getIncidentType(): ?string
    {
        return $this->incidentType;
    }

    /**
     * Type of the incident.
     */
    public function setIncidentType(?string $incidentType): self
    {
        $this->initialized['incidentType'] = true;
        $this->incidentType = $incidentType;

        return $this;
    }

    /**
     * Responsibility level for the incident.
     */
    public function getIncidentResponsability(): ?string
    {
        return $this->incidentResponsability;
    }

    /**
     * Responsibility level for the incident.
     */
    public function setIncidentResponsability(?string $incidentResponsability): self
    {
        $this->initialized['incidentResponsability'] = true;
        $this->incidentResponsability = $incidentResponsability;

        return $this;
    }

    /**
     * Full name of the driver involved in the incident.
     */
    public function getDriversFullName(): ?string
    {
        return $this->driversFullName;
    }

    /**
     * Full name of the driver involved in the incident.
     */
    public function setDriversFullName(?string $driversFullName): self
    {
        $this->initialized['driversFullName'] = true;
        $this->driversFullName = $driversFullName;

        return $this;
    }
}
