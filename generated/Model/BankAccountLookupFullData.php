<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BankAccountLookupFullData implements AdditionalPropertiesInterface
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
     * @var BankAccountLookupFullDataExtractedFromDocument|null
     */
    protected $extractedFromDocument;
    /**
     * The account holder name as the bank holds it, disclosed when the name you submitted is a
     * close match. Best effort: the bank does not always disclose it.
     *
     * @var string|null
     */
    protected $accountHolder;

    public function getExtractedFromDocument(): ?BankAccountLookupFullDataExtractedFromDocument
    {
        return $this->extractedFromDocument;
    }

    public function setExtractedFromDocument(?BankAccountLookupFullDataExtractedFromDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    /**
     * The account holder name as the bank holds it, disclosed when the name you submitted is a
     * close match. Best effort: the bank does not always disclose it.
     */
    public function getAccountHolder(): ?string
    {
        return $this->accountHolder;
    }

    /**
     * The account holder name as the bank holds it, disclosed when the name you submitted is a
     * close match. Best effort: the bank does not always disclose it.
     */
    public function setAccountHolder(?string $accountHolder): self
    {
        $this->initialized['accountHolder'] = true;
        $this->accountHolder = $accountHolder;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['extractedFromDocument' => ['extracted_from_document', 'getExtractedFromDocument', 'setExtractedFromDocument'], 'accountHolder' => ['account_holder', 'getAccountHolder', 'setAccountHolder']];
    }
}
