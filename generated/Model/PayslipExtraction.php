<?php

namespace Qdequippe\Yousign\Api\Model;

class PayslipExtraction
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
     * The employee first name extracted from the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The employee last name extracted from the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The employee full name extracted from the document.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * The employer name extracted from the document.
     *
     * @var string|null
     */
    protected $employerName;
    /**
     * The pay period start date extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $payPeriodStartDate;
    /**
     * The pay period end date extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $payPeriodEndDate;
    /**
     * The net salary extracted from the document.
     *
     * @var float|null
     */
    protected $netPay;
    /**
     * The gross salary extracted from the document.
     *
     * @var float|null
     */
    protected $grossPay;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The employee first name extracted from the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * The employee first name extracted from the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The employee last name extracted from the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * The employee last name extracted from the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * The employee full name extracted from the document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * The employee full name extracted from the document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * The employer name extracted from the document.
     */
    public function getEmployerName(): ?string
    {
        return $this->employerName;
    }

    /**
     * The employer name extracted from the document.
     */
    public function setEmployerName(?string $employerName): self
    {
        $this->initialized['employerName'] = true;
        $this->employerName = $employerName;

        return $this;
    }

    /**
     * The pay period start date extracted from the document.
     */
    public function getPayPeriodStartDate(): ?\DateTime
    {
        return $this->payPeriodStartDate;
    }

    /**
     * The pay period start date extracted from the document.
     */
    public function setPayPeriodStartDate(?\DateTime $payPeriodStartDate): self
    {
        $this->initialized['payPeriodStartDate'] = true;
        $this->payPeriodStartDate = $payPeriodStartDate;

        return $this;
    }

    /**
     * The pay period end date extracted from the document.
     */
    public function getPayPeriodEndDate(): ?\DateTime
    {
        return $this->payPeriodEndDate;
    }

    /**
     * The pay period end date extracted from the document.
     */
    public function setPayPeriodEndDate(?\DateTime $payPeriodEndDate): self
    {
        $this->initialized['payPeriodEndDate'] = true;
        $this->payPeriodEndDate = $payPeriodEndDate;

        return $this;
    }

    /**
     * The net salary extracted from the document.
     */
    public function getNetPay(): ?float
    {
        return $this->netPay;
    }

    /**
     * The net salary extracted from the document.
     */
    public function setNetPay(?float $netPay): self
    {
        $this->initialized['netPay'] = true;
        $this->netPay = $netPay;

        return $this;
    }

    /**
     * The gross salary extracted from the document.
     */
    public function getGrossPay(): ?float
    {
        return $this->grossPay;
    }

    /**
     * The gross salary extracted from the document.
     */
    public function setGrossPay(?float $grossPay): self
    {
        $this->initialized['grossPay'] = true;
        $this->grossPay = $grossPay;

        return $this;
    }

    /**
     * The document type extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
