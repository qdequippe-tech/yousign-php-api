<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateDocumentAnalysisFromApplicant
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
     * The Applicant ID linked to the Workflow Session.
     *
     * @var string|null
     */
    protected $applicantId;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * Controls what the Document Analysis performs.
     *
     * - When `extraction` is `true` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `false` (fraud-only), no `type` must be provided and `fraud_level` must be `standard` or `advanced`. Only available with `multipart/form-data` (direct file upload); not supported when attaching to an Applicant (`application/json`), where a document `type` is always required.
     *
     * @var AnalysisType|null
     */
    protected $analysisType;
    /**
     * The country code of the document.
     * Required, when extraction is enabled, if `type` is `vehicle_registration_document` (accepted: `FR`, `IT`), `temporary_vehicle_registration_document` (accepted: `IT`), `tax_notice` (accepted: `FR`, `DE`, `IT`), `payslip` (accepted: `FR`, `IT`), `invoice` (accepted: `FR`, `IT`, `DE`), `proof_of_address` (accepted: `IT`, `DE`) or `id_document` (accepted: `DE`).
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Checks to perform on the document.
     * Only accepted when `type` is `tax_notice`.
     *
     * @var InitiateDocumentAnalysisFromApplicantChecks|null
     */
    protected $checks;

    /**
     * The Applicant ID linked to the Workflow Session.
     */
    public function getApplicantId(): ?string
    {
        return $this->applicantId;
    }

    /**
     * The Applicant ID linked to the Workflow Session.
     */
    public function setApplicantId(?string $applicantId): self
    {
        $this->initialized['applicantId'] = true;
        $this->applicantId = $applicantId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Controls what the Document Analysis performs.
     *
     * - When `extraction` is `true` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `false` (fraud-only), no `type` must be provided and `fraud_level` must be `standard` or `advanced`. Only available with `multipart/form-data` (direct file upload); not supported when attaching to an Applicant (`application/json`), where a document `type` is always required.
     */
    public function getAnalysisType(): ?AnalysisType
    {
        return $this->analysisType;
    }

    /**
     * Controls what the Document Analysis performs.
     *
     * - When `extraction` is `true` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `false` (fraud-only), no `type` must be provided and `fraud_level` must be `standard` or `advanced`. Only available with `multipart/form-data` (direct file upload); not supported when attaching to an Applicant (`application/json`), where a document `type` is always required.
     */
    public function setAnalysisType(?AnalysisType $analysisType): self
    {
        $this->initialized['analysisType'] = true;
        $this->analysisType = $analysisType;

        return $this;
    }

    /**
     * The country code of the document.
     * Required, when extraction is enabled, if `type` is `vehicle_registration_document` (accepted: `FR`, `IT`), `temporary_vehicle_registration_document` (accepted: `IT`), `tax_notice` (accepted: `FR`, `DE`, `IT`), `payslip` (accepted: `FR`, `IT`), `invoice` (accepted: `FR`, `IT`, `DE`), `proof_of_address` (accepted: `IT`, `DE`) or `id_document` (accepted: `DE`).
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * The country code of the document.
     * Required, when extraction is enabled, if `type` is `vehicle_registration_document` (accepted: `FR`, `IT`), `temporary_vehicle_registration_document` (accepted: `IT`), `tax_notice` (accepted: `FR`, `DE`, `IT`), `payslip` (accepted: `FR`, `IT`), `invoice` (accepted: `FR`, `IT`, `DE`), `proof_of_address` (accepted: `IT`, `DE`) or `id_document` (accepted: `DE`).
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Checks to perform on the document.
     * Only accepted when `type` is `tax_notice`.
     */
    public function getChecks(): ?InitiateDocumentAnalysisFromApplicantChecks
    {
        return $this->checks;
    }

    /**
     * Checks to perform on the document.
     * Only accepted when `type` is `tax_notice`.
     */
    public function setChecks(?InitiateDocumentAnalysisFromApplicantChecks $checks): self
    {
        $this->initialized['checks'] = true;
        $this->checks = $checks;

        return $this;
    }
}
