<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner
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
     * Full name of the co-owner.
     *
     * @var string|null
     */
    protected $coOwnerFullName;

    /**
     * Full name of the co-owner.
     */
    public function getCoOwnerFullName(): ?string
    {
        return $this->coOwnerFullName;
    }

    /**
     * Full name of the co-owner.
     */
    public function setCoOwnerFullName(?string $coOwnerFullName): self
    {
        $this->initialized['coOwnerFullName'] = true;
        $this->coOwnerFullName = $coOwnerFullName;

        return $this;
    }
}
