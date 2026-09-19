<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchInvoiceExtraction
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
     * The date the invoice was issued, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * The invoice number extracted from the document.
     *
     * @var string|null
     */
    protected $invoiceNumber;
    /**
     * The date of the sale or service, extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $invoiceDate;
    /**
     * The seller (issuer) name extracted from the document.
     *
     * @var string|null
     */
    protected $sellerName;
    /**
     * The seller (issuer) postal address extracted from the document.
     *
     * @var string|null
     */
    protected $sellerAddress;
    /**
     * The seller SIREN or SIRET number extracted from the document.
     *
     * @var string|null
     */
    protected $sellerCompanyNumber;
    /**
     * The seller intra-community VAT number extracted from the document.
     *
     * @var string|null
     */
    protected $vatIdentificationNumber;
    /**
     * The billing address extracted from the document, when distinct.
     *
     * @var string|null
     */
    protected $billingAddress;
    /**
     * The shipping address extracted from the document, when distinct.
     *
     * @var string|null
     */
    protected $shippingAddress;
    /**
     * The buyer (customer) name extracted from the document.
     *
     * @var string|null
     */
    protected $buyerName;
    /**
     * The buyer (customer) postal address extracted from the document.
     *
     * @var string|null
     */
    protected $buyerAddress;
    /**
     * The total amount excluding taxes extracted from the document.
     *
     * @var float|null
     */
    protected $totalExcludingTaxes;
    /**
     * The total amount including taxes extracted from the document.
     *
     * @var float|null
     */
    protected $totalIncludingTaxes;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The date the invoice was issued, extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The date the invoice was issued, extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * The invoice number extracted from the document.
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * The invoice number extracted from the document.
     */
    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->initialized['invoiceNumber'] = true;
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * The date of the sale or service, extracted from the document.
     */
    public function getInvoiceDate(): ?\DateTime
    {
        return $this->invoiceDate;
    }

    /**
     * The date of the sale or service, extracted from the document.
     */
    public function setInvoiceDate(?\DateTime $invoiceDate): self
    {
        $this->initialized['invoiceDate'] = true;
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * The seller (issuer) name extracted from the document.
     */
    public function getSellerName(): ?string
    {
        return $this->sellerName;
    }

    /**
     * The seller (issuer) name extracted from the document.
     */
    public function setSellerName(?string $sellerName): self
    {
        $this->initialized['sellerName'] = true;
        $this->sellerName = $sellerName;

        return $this;
    }

    /**
     * The seller (issuer) postal address extracted from the document.
     */
    public function getSellerAddress(): ?string
    {
        return $this->sellerAddress;
    }

    /**
     * The seller (issuer) postal address extracted from the document.
     */
    public function setSellerAddress(?string $sellerAddress): self
    {
        $this->initialized['sellerAddress'] = true;
        $this->sellerAddress = $sellerAddress;

        return $this;
    }

    /**
     * The seller SIREN or SIRET number extracted from the document.
     */
    public function getSellerCompanyNumber(): ?string
    {
        return $this->sellerCompanyNumber;
    }

    /**
     * The seller SIREN or SIRET number extracted from the document.
     */
    public function setSellerCompanyNumber(?string $sellerCompanyNumber): self
    {
        $this->initialized['sellerCompanyNumber'] = true;
        $this->sellerCompanyNumber = $sellerCompanyNumber;

        return $this;
    }

    /**
     * The seller intra-community VAT number extracted from the document.
     */
    public function getVatIdentificationNumber(): ?string
    {
        return $this->vatIdentificationNumber;
    }

    /**
     * The seller intra-community VAT number extracted from the document.
     */
    public function setVatIdentificationNumber(?string $vatIdentificationNumber): self
    {
        $this->initialized['vatIdentificationNumber'] = true;
        $this->vatIdentificationNumber = $vatIdentificationNumber;

        return $this;
    }

    /**
     * The billing address extracted from the document, when distinct.
     */
    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    /**
     * The billing address extracted from the document, when distinct.
     */
    public function setBillingAddress(?string $billingAddress): self
    {
        $this->initialized['billingAddress'] = true;
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * The shipping address extracted from the document, when distinct.
     */
    public function getShippingAddress(): ?string
    {
        return $this->shippingAddress;
    }

    /**
     * The shipping address extracted from the document, when distinct.
     */
    public function setShippingAddress(?string $shippingAddress): self
    {
        $this->initialized['shippingAddress'] = true;
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * The buyer (customer) name extracted from the document.
     */
    public function getBuyerName(): ?string
    {
        return $this->buyerName;
    }

    /**
     * The buyer (customer) name extracted from the document.
     */
    public function setBuyerName(?string $buyerName): self
    {
        $this->initialized['buyerName'] = true;
        $this->buyerName = $buyerName;

        return $this;
    }

    /**
     * The buyer (customer) postal address extracted from the document.
     */
    public function getBuyerAddress(): ?string
    {
        return $this->buyerAddress;
    }

    /**
     * The buyer (customer) postal address extracted from the document.
     */
    public function setBuyerAddress(?string $buyerAddress): self
    {
        $this->initialized['buyerAddress'] = true;
        $this->buyerAddress = $buyerAddress;

        return $this;
    }

    /**
     * The total amount excluding taxes extracted from the document.
     */
    public function getTotalExcludingTaxes(): ?float
    {
        return $this->totalExcludingTaxes;
    }

    /**
     * The total amount excluding taxes extracted from the document.
     */
    public function setTotalExcludingTaxes(?float $totalExcludingTaxes): self
    {
        $this->initialized['totalExcludingTaxes'] = true;
        $this->totalExcludingTaxes = $totalExcludingTaxes;

        return $this;
    }

    /**
     * The total amount including taxes extracted from the document.
     */
    public function getTotalIncludingTaxes(): ?float
    {
        return $this->totalIncludingTaxes;
    }

    /**
     * The total amount including taxes extracted from the document.
     */
    public function setTotalIncludingTaxes(?float $totalIncludingTaxes): self
    {
        $this->initialized['totalIncludingTaxes'] = true;
        $this->totalIncludingTaxes = $totalIncludingTaxes;

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
