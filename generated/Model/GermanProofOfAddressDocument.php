<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class GermanProofOfAddressDocument implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * The unique identifier for a resource.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The Workspace ID in which the Document Analysis has been created.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     *
     * @var string|null
     */
    protected $workflowSessionId;
    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     *
     * @var string|null
     */
    protected $previousAttemptId;
    /**
     * Creation date of the Document Analysis.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Update date of the Document Analysis.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Status of the Document Analysis.
     *
     * @var string|null
     */
    protected $status;
    /**
     * List of status codes. Indicates the cause when the status is `failed`.
     *
     * `DA_1001` is **deprecated**: it is still emitted alongside more specific check-failure codes (e.g. `DA_2001`, `DA_2002`) for backward compatibility. New integrations should rely on the specific codes.
     *
     * @var list<mixed>|null
     */
    protected $statusCodes;
    /**
     * The country code associated with the document analysis.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Unique identifier of an Applicant.
     *
     * @var string|null
     */
    protected $applicantId;
    /**
     * Indicates if the personal data extracted from the document has been anonymized.
     * If set to `true`, the personal data has been anonymized and most fields will be NULL.
     *
     * @var bool|null
     */
    protected $dataAnonymized;
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
     * Result of the fraud detection analysis. `null` when no fraud detection verdict is available
     * (e.g. fraud detection was not requested, or is still in progress).
     *
     * @var FraudRiskAnalysis|null
     */
    protected $fraudRiskAnalysis;
    /**
     * Result of the document classification.
     * `null` when no classification ran for this analysis, When a classification
     * did run, the node is present and `document_type` may itself be `null`,
     * meaning no supported type was recognised on the document.
     *
     * @var DocumentClassification|null
     */
    protected $documentClassification;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * Extracted data from the document.
     *
     * @var GermanProofOfAddressExtraction|null
     */
    protected $extractedFromDocument;
    /**
     * Checks performed on the document.
     *
     * @var ProofOfAddressCheck|null
     */
    protected $checks;

    /**
     * The unique identifier for a resource.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The unique identifier for a resource.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The Workspace ID in which the Document Analysis has been created.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * The Workspace ID in which the Document Analysis has been created.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function getWorkflowSessionId(): ?string
    {
        return $this->workflowSessionId;
    }

    /**
     * Unique identifier of a Workflow Session. When provided, an Action is created in the Workflow Session, and this resource is associated with that Action.
     */
    public function setWorkflowSessionId(?string $workflowSessionId): self
    {
        $this->initialized['workflowSessionId'] = true;
        $this->workflowSessionId = $workflowSessionId;

        return $this;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function getPreviousAttemptId(): ?string
    {
        return $this->previousAttemptId;
    }

    /**
     * ID of the previous attempt within the same `workflow_session_id`.
     * Allows continuity between multiple attempts of the same Action.
     * Null if this is the first attempt.
     */
    public function setPreviousAttemptId(?string $previousAttemptId): self
    {
        $this->initialized['previousAttemptId'] = true;
        $this->previousAttemptId = $previousAttemptId;

        return $this;
    }

    /**
     * Creation date of the Document Analysis.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation date of the Document Analysis.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Update date of the Document Analysis.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Update date of the Document Analysis.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Status of the Document Analysis.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status of the Document Analysis.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * List of status codes. Indicates the cause when the status is `failed`.
     *
     * `DA_1001` is **deprecated**: it is still emitted alongside more specific check-failure codes (e.g. `DA_2001`, `DA_2002`) for backward compatibility. New integrations should rely on the specific codes.
     *
     * @return list<mixed>|null
     */
    public function getStatusCodes(): ?array
    {
        return $this->statusCodes;
    }

    /**
     * List of status codes. Indicates the cause when the status is `failed`.
     *
     * `DA_1001` is **deprecated**: it is still emitted alongside more specific check-failure codes (e.g. `DA_2001`, `DA_2002`) for backward compatibility. New integrations should rely on the specific codes.
     *
     * @param list<mixed>|null $statusCodes
     */
    public function setStatusCodes(?array $statusCodes): self
    {
        $this->initialized['statusCodes'] = true;
        $this->statusCodes = $statusCodes;

        return $this;
    }

    /**
     * The country code associated with the document analysis.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * The country code associated with the document analysis.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Unique identifier of an Applicant.
     */
    public function getApplicantId(): ?string
    {
        return $this->applicantId;
    }

    /**
     * Unique identifier of an Applicant.
     */
    public function setApplicantId(?string $applicantId): self
    {
        $this->initialized['applicantId'] = true;
        $this->applicantId = $applicantId;

        return $this;
    }

    /**
     * Indicates if the personal data extracted from the document has been anonymized.
     * If set to `true`, the personal data has been anonymized and most fields will be NULL.
     */
    public function getDataAnonymized(): ?bool
    {
        return $this->dataAnonymized;
    }

    /**
     * Indicates if the personal data extracted from the document has been anonymized.
     * If set to `true`, the personal data has been anonymized and most fields will be NULL.
     */
    public function setDataAnonymized(?bool $dataAnonymized): self
    {
        $this->initialized['dataAnonymized'] = true;
        $this->dataAnonymized = $dataAnonymized;

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
     * Result of the fraud detection analysis. `null` when no fraud detection verdict is available
     * (e.g. fraud detection was not requested, or is still in progress).
     */
    public function getFraudRiskAnalysis(): ?FraudRiskAnalysis
    {
        return $this->fraudRiskAnalysis;
    }

    /**
     * Result of the fraud detection analysis. `null` when no fraud detection verdict is available
     * (e.g. fraud detection was not requested, or is still in progress).
     */
    public function setFraudRiskAnalysis(?FraudRiskAnalysis $fraudRiskAnalysis): self
    {
        $this->initialized['fraudRiskAnalysis'] = true;
        $this->fraudRiskAnalysis = $fraudRiskAnalysis;

        return $this;
    }

    /**
     * Result of the document classification.
     * `null` when no classification ran for this analysis, When a classification
     * did run, the node is present and `document_type` may itself be `null`,
     * meaning no supported type was recognised on the document.
     */
    public function getDocumentClassification(): ?DocumentClassification
    {
        return $this->documentClassification;
    }

    /**
     * Result of the document classification.
     * `null` when no classification ran for this analysis, When a classification
     * did run, the node is present and `document_type` may itself be `null`,
     * meaning no supported type was recognised on the document.
     */
    public function setDocumentClassification(?DocumentClassification $documentClassification): self
    {
        $this->initialized['documentClassification'] = true;
        $this->documentClassification = $documentClassification;

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
     * Extracted data from the document.
     */
    public function getExtractedFromDocument(): ?GermanProofOfAddressExtraction
    {
        return $this->extractedFromDocument;
    }

    /**
     * Extracted data from the document.
     */
    public function setExtractedFromDocument(?GermanProofOfAddressExtraction $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    /**
     * Checks performed on the document.
     */
    public function getChecks(): ?ProofOfAddressCheck
    {
        return $this->checks;
    }

    /**
     * Checks performed on the document.
     */
    public function setChecks(?ProofOfAddressCheck $checks): self
    {
        $this->initialized['checks'] = true;
        $this->checks = $checks;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'updatedAt' => ['updated_at', 'getUpdatedAt', 'setUpdatedAt'], 'status' => ['status', 'getStatus', 'setStatus'], 'statusCodes' => ['status_codes', 'getStatusCodes', 'setStatusCodes'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode'], 'applicantId' => ['applicant_id', 'getApplicantId', 'setApplicantId'], 'dataAnonymized' => ['data_anonymized', 'getDataAnonymized', 'setDataAnonymized'], 'analysisType' => ['analysis_type', 'getAnalysisType', 'setAnalysisType'], 'fraudRiskAnalysis' => ['fraud_risk_analysis', 'getFraudRiskAnalysis', 'setFraudRiskAnalysis'], 'documentClassification' => ['document_classification', 'getDocumentClassification', 'setDocumentClassification'], 'type' => ['type', 'getType', 'setType'], 'extractedFromDocument' => ['extracted_from_document', 'getExtractedFromDocument', 'setExtractedFromDocument'], 'checks' => ['checks', 'getChecks', 'setChecks']];
    }
}
