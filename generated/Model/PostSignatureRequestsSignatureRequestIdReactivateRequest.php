<?php

namespace Qdequippe\Yousign\Api\Model;

class PostSignatureRequestsSignatureRequestIdReactivateRequest extends \ArrayObject
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
     * Due date of the Signature Request (yyyy-mm-dd). Default to 6 month after the activation.
     *
     * @var \DateTime|null
     */
    protected $expirationDate;

    /**
     * Due date of the Signature Request (yyyy-mm-dd). Default to 6 month after the activation.
     */
    public function getExpirationDate(): ?\DateTime
    {
        return $this->expirationDate;
    }

    /**
     * Due date of the Signature Request (yyyy-mm-dd). Default to 6 month after the activation.
     */
    public function setExpirationDate(?\DateTime $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }
}
