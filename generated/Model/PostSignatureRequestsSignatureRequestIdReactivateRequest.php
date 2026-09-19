<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class PostSignatureRequestsSignatureRequestIdReactivateRequest implements AdditionalPropertiesInterface
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
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;

    /**
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the Signature Request (yyyy-mm-dd).
     * The date cannot be in the past and cannot be more than one year after initiation.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['expirationDate' => ['expiration_date', 'getExpirationDate', 'setExpirationDate']];
    }
}
