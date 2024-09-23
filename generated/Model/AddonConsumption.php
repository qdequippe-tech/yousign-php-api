<?php

namespace Qdequippe\Yousign\Api\Model;

class AddonConsumption extends \ArrayObject
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
     * @var string|null
     */
    protected $name;
    /**
     * Beginning of the addon subscription.
     *
     * @var \DateTime|null
     */
    protected $startAt;
    /**
     * End of the addon subscription.
     *
     * @var \DateTime|null
     */
    protected $endAt;
    /**
     * @var int|null
     */
    protected $quota;
    /**
     * @var int|null
     */
    protected $consumed;
    /**
     * Only available for qualified_electronic_signature_identity_verification and qualified_electronic_signature_saved_identity addons.
     *
     * @var int|null
     */
    protected $provisioned;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Beginning of the addon subscription.
     */
    public function getStartAt(): ?\DateTime
    {
        return $this->startAt;
    }

    /**
     * Beginning of the addon subscription.
     */
    public function setStartAt(?\DateTime $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * End of the addon subscription.
     */
    public function getEndAt(): ?\DateTime
    {
        return $this->endAt;
    }

    /**
     * End of the addon subscription.
     */
    public function setEndAt(?\DateTime $endAt): self
    {
        $this->initialized['endAt'] = true;
        $this->endAt = $endAt;

        return $this;
    }

    public function getQuota(): ?int
    {
        return $this->quota;
    }

    public function setQuota(?int $quota): self
    {
        $this->initialized['quota'] = true;
        $this->quota = $quota;

        return $this;
    }

    public function getConsumed(): ?int
    {
        return $this->consumed;
    }

    public function setConsumed(?int $consumed): self
    {
        $this->initialized['consumed'] = true;
        $this->consumed = $consumed;

        return $this;
    }

    /**
     * Only available for qualified_electronic_signature_identity_verification and qualified_electronic_signature_saved_identity addons.
     */
    public function getProvisioned(): ?int
    {
        return $this->provisioned;
    }

    /**
     * Only available for qualified_electronic_signature_identity_verification and qualified_electronic_signature_saved_identity addons.
     */
    public function setProvisioned(?int $provisioned): self
    {
        $this->initialized['provisioned'] = true;
        $this->provisioned = $provisioned;

        return $this;
    }
}
