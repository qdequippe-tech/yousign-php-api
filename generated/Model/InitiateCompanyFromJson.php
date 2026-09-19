<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateCompanyFromJson implements AdditionalPropertiesInterface
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
     * Please provide the exact company number depending on the country format.
     * For any doubt, consult the Company Verification [guide](https://developers.youtrust.com/docs/company-verification).
     *
     * @var string|null
     */
    protected $companyNumber;
    /**
     * Defines the country where the company is registered.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Scopes the verification to a specific workspace.
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
     * The company name. Required for German (DE) companies.\
     * When country_code is DE, this field must be provided.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Additional search field. Only accepted when country_code is DE.\
     * For DE, it must be a 5-digit Postleitzahl (e.g. "10115").\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $zipCode;
    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $street;
    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $city;
    /**
     * Additional search field. Only accepted when country_code is DE.\
     * The German commercial register court (Registergericht) handling the company.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $registerCourt;

    /**
     * Please provide the exact company number depending on the country format.
     * For any doubt, consult the Company Verification [guide](https://developers.youtrust.com/docs/company-verification).
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * Please provide the exact company number depending on the country format.
     * For any doubt, consult the Company Verification [guide](https://developers.youtrust.com/docs/company-verification).
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * Defines the country where the company is registered.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * Defines the country where the company is registered.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Scopes the verification to a specific workspace.
     * Defaults to the default workspace if not specified.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Scopes the verification to a specific workspace.
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
     * The company name. Required for German (DE) companies.\
     * When country_code is DE, this field must be provided.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * The company name. Required for German (DE) companies.\
     * When country_code is DE, this field must be provided.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * For DE, it must be a 5-digit Postleitzahl (e.g. "10115").\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * For DE, it must be a 5-digit Postleitzahl (e.g. "10115").\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setZipCode(?string $zipCode): self
    {
        $this->initialized['zipCode'] = true;
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setStreet(?string $street): self
    {
        $this->initialized['street'] = true;
        $this->street = $street;

        return $this;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * Helps narrow the company lookup when several companies share similar names.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;

        return $this;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * The German commercial register court (Registergericht) handling the company.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getRegisterCourt(): ?string
    {
        return $this->registerCourt;
    }

    /**
     * Additional search field. Only accepted when country_code is DE.\
     * The German commercial register court (Registergericht) handling the company.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setRegisterCourt(?string $registerCourt): self
    {
        $this->initialized['registerCourt'] = true;
        $this->registerCourt = $registerCourt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'workflowSessionId' => ['workflow_session_id', 'getWorkflowSessionId', 'setWorkflowSessionId'], 'previousAttemptId' => ['previous_attempt_id', 'getPreviousAttemptId', 'setPreviousAttemptId'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName'], 'zipCode' => ['zip_code', 'getZipCode', 'setZipCode'], 'street' => ['street', 'getStreet', 'setStreet'], 'city' => ['city', 'getCity', 'setCity'], 'registerCourt' => ['register_court', 'getRegisterCourt', 'setRegisterCourt']];
    }
}
