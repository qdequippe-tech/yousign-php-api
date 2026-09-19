<?php

namespace Qdequippe\Yousign\Api\Model;

class DocumentClassification
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
     * The document type detected on the analysed document, `null` when the analysed document matches no supported type. New values may be added over time; integrations must tolerate unknown values.
     *
     * @var string|null
     */
    protected $documentType;
    /**
     * The issuing country detected on the analysed document, as an uppercase ISO 3166-1 alpha-2 code, `null` when no issuing country could be matched on the document, for example when no supported type was recognised or when the issuing country is outside the supported list.
     *
     * @var string|null
     */
    protected $countryCode;

    /**
     * The document type detected on the analysed document, `null` when the analysed document matches no supported type. New values may be added over time; integrations must tolerate unknown values.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type detected on the analysed document, `null` when the analysed document matches no supported type. New values may be added over time; integrations must tolerate unknown values.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * The issuing country detected on the analysed document, as an uppercase ISO 3166-1 alpha-2 code, `null` when no issuing country could be matched on the document, for example when no supported type was recognised or when the issuing country is outside the supported list.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * The issuing country detected on the analysed document, as an uppercase ISO 3166-1 alpha-2 code, `null` when no issuing country could be matched on the document, for example when no supported type was recognised or when the issuing country is outside the supported list.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }
}
