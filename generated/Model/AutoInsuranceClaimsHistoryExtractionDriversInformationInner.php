<?php

namespace Qdequippe\Yousign\Api\Model;

class AutoInsuranceClaimsHistoryExtractionDriversInformationInner
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
     * Full name of the driver.
     *
     * @var string|null
     */
    protected $driverFullName;
    /**
     * Birth date of the driver.
     *
     * @var \DateTime|null
     */
    protected $driverBirthDate;
    /**
     * Start date of the driver's coverage.
     *
     * @var \DateTime|null
     */
    protected $coverageStartDate;
    /**
     * End date of the driver's coverage, if applicable.
     *
     * @var \DateTime|null
     */
    protected $coverageEndDate;
    /**
     * License number of the driver.
     *
     * @var string|null
     */
    protected $driverLicenseNumber;
    /**
     * License category of the driver.
     *
     * @var string|null
     */
    protected $driverLicenseCategory;
    /**
     * Issuance date of the driver's license.
     *
     * @var \DateTime|null
     */
    protected $driverLicenseIssuanceDate;

    /**
     * Full name of the driver.
     */
    public function getDriverFullName(): ?string
    {
        return $this->driverFullName;
    }

    /**
     * Full name of the driver.
     */
    public function setDriverFullName(?string $driverFullName): self
    {
        $this->initialized['driverFullName'] = true;
        $this->driverFullName = $driverFullName;

        return $this;
    }

    /**
     * Birth date of the driver.
     */
    public function getDriverBirthDate(): ?\DateTime
    {
        return $this->driverBirthDate;
    }

    /**
     * Birth date of the driver.
     */
    public function setDriverBirthDate(?\DateTime $driverBirthDate): self
    {
        $this->initialized['driverBirthDate'] = true;
        $this->driverBirthDate = $driverBirthDate;

        return $this;
    }

    /**
     * Start date of the driver's coverage.
     */
    public function getCoverageStartDate(): ?\DateTime
    {
        return $this->coverageStartDate;
    }

    /**
     * Start date of the driver's coverage.
     */
    public function setCoverageStartDate(?\DateTime $coverageStartDate): self
    {
        $this->initialized['coverageStartDate'] = true;
        $this->coverageStartDate = $coverageStartDate;

        return $this;
    }

    /**
     * End date of the driver's coverage, if applicable.
     */
    public function getCoverageEndDate(): ?\DateTime
    {
        return $this->coverageEndDate;
    }

    /**
     * End date of the driver's coverage, if applicable.
     */
    public function setCoverageEndDate(?\DateTime $coverageEndDate): self
    {
        $this->initialized['coverageEndDate'] = true;
        $this->coverageEndDate = $coverageEndDate;

        return $this;
    }

    /**
     * License number of the driver.
     */
    public function getDriverLicenseNumber(): ?string
    {
        return $this->driverLicenseNumber;
    }

    /**
     * License number of the driver.
     */
    public function setDriverLicenseNumber(?string $driverLicenseNumber): self
    {
        $this->initialized['driverLicenseNumber'] = true;
        $this->driverLicenseNumber = $driverLicenseNumber;

        return $this;
    }

    /**
     * License category of the driver.
     */
    public function getDriverLicenseCategory(): ?string
    {
        return $this->driverLicenseCategory;
    }

    /**
     * License category of the driver.
     */
    public function setDriverLicenseCategory(?string $driverLicenseCategory): self
    {
        $this->initialized['driverLicenseCategory'] = true;
        $this->driverLicenseCategory = $driverLicenseCategory;

        return $this;
    }

    /**
     * Issuance date of the driver's license.
     */
    public function getDriverLicenseIssuanceDate(): ?\DateTime
    {
        return $this->driverLicenseIssuanceDate;
    }

    /**
     * Issuance date of the driver's license.
     */
    public function setDriverLicenseIssuanceDate(?\DateTime $driverLicenseIssuanceDate): self
    {
        $this->initialized['driverLicenseIssuanceDate'] = true;
        $this->driverLicenseIssuanceDate = $driverLicenseIssuanceDate;

        return $this;
    }
}
