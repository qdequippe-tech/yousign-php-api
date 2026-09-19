<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataExtractedFromDocument implements AdditionalPropertiesInterface
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
     * Company number extracted from the document.
     *
     * @var string|null
     */
    protected $companyNumber;
    /**
     * Date when the document was issued.
     *
     * @var \DateTime|null
     */
    protected $issuedOn;

    /**
     * Company number extracted from the document.
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * Company number extracted from the document.
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * Date when the document was issued.
     */
    public function getIssuedOn(): ?\DateTime
    {
        return $this->issuedOn;
    }

    /**
     * Date when the document was issued.
     */
    public function setIssuedOn(?\DateTime $issuedOn): self
    {
        $this->initialized['issuedOn'] = true;
        $this->issuedOn = $issuedOn;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber'], 'issuedOn' => ['issued_on', 'getIssuedOn', 'setIssuedOn']];
    }
}
