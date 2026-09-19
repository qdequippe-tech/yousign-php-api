<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;

class InitiatePayslip
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
     * The file containing the data to extract.
     * Accepted formats: PDF, PNG, JPG, JPEG.
     * Max size: 25 MB.
     * Max number of pages per PDF: 10.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * Type of document you want to analyze. Will be used to match the detected document type.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The country code of the payslip.
     * Required when extraction is enabled.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Scopes the Document Analysis to a specific workspace.
     * Defaults to the default workspace if not specified.
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
     * Same as `analysis_type` on the JSON path, but sent as `multipart/form-data`.
     * Because form-data has no native boolean, `extraction` is a string (`"true"`/`"false"`).
     *
     * - When `extraction` is `"true"` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `"false"` (fraud-only), no `type` must be provided and `fraud_level` must be `advanced`.
     *
     * @var AnalysisTypeMultipart|null
     */
    protected $analysisType;
    /**
     * Checks to perform on the document.
     * Not supported when `extraction` is `false`: the request is rejected.
     *
     * @var InitiatePayslipChecks|null
     */
    protected $checks;

    /**
     * The file containing the data to extract.
     * Accepted formats: PDF, PNG, JPG, JPEG.
     * Max size: 25 MB.
     * Max number of pages per PDF: 10.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * The file containing the data to extract.
     * Accepted formats: PDF, PNG, JPG, JPEG.
     * Max size: 25 MB.
     * Max number of pages per PDF: 10.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Type of document you want to analyze. Will be used to match the detected document type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of document you want to analyze. Will be used to match the detected document type.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The country code of the payslip.
     * Required when extraction is enabled.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * The country code of the payslip.
     * Required when extraction is enabled.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Scopes the Document Analysis to a specific workspace.
     * Defaults to the default workspace if not specified.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Scopes the Document Analysis to a specific workspace.
     * Defaults to the default workspace if not specified.
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
     * Same as `analysis_type` on the JSON path, but sent as `multipart/form-data`.
     * Because form-data has no native boolean, `extraction` is a string (`"true"`/`"false"`).
     *
     * - When `extraction` is `"true"` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `"false"` (fraud-only), no `type` must be provided and `fraud_level` must be `advanced`.
     */
    public function getAnalysisType(): ?AnalysisTypeMultipart
    {
        return $this->analysisType;
    }

    /**
     * Same as `analysis_type` on the JSON path, but sent as `multipart/form-data`.
     * Because form-data has no native boolean, `extraction` is a string (`"true"`/`"false"`).
     *
     * - When `extraction` is `"true"` (default), data is extracted from the document and a document `type` is **required**.
     * - When `extraction` is `"false"` (fraud-only), no `type` must be provided and `fraud_level` must be `advanced`.
     */
    public function setAnalysisType(?AnalysisTypeMultipart $analysisType): self
    {
        $this->initialized['analysisType'] = true;
        $this->analysisType = $analysisType;

        return $this;
    }

    /**
     * Checks to perform on the document.
     * Not supported when `extraction` is `false`: the request is rejected.
     */
    public function getChecks(): ?InitiatePayslipChecks
    {
        return $this->checks;
    }

    /**
     * Checks to perform on the document.
     * Not supported when `extraction` is `false`: the request is rejected.
     */
    public function setChecks(?InitiatePayslipChecks $checks): self
    {
        $this->initialized['checks'] = true;
        $this->checks = $checks;

        return $this;
    }
}
