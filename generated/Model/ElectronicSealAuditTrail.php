<?php

namespace Qdequippe\Yousign\Api\Model;

class ElectronicSealAuditTrail extends \ArrayObject
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
     * @var float|null
     */
    protected $version;
    /**
     * @var string|null
     */
    protected $classification;
    /**
     * @var array<string, mixed>|null
     */
    protected $organization;
    /**
     * @var array<string, mixed>|null
     */
    protected $seal;
    /**
     * @var array<string, mixed>|null
     */
    protected $document;

    public function getVersion(): ?float
    {
        return $this->version;
    }

    public function setVersion(?float $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): self
    {
        $this->initialized['classification'] = true;
        $this->classification = $classification;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getOrganization(): ?iterable
    {
        return $this->organization;
    }

    /**
     * @param array<string, mixed>|null $organization
     */
    public function setOrganization(?iterable $organization): self
    {
        $this->initialized['organization'] = true;
        $this->organization = $organization;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getSeal(): ?iterable
    {
        return $this->seal;
    }

    /**
     * @param array<string, mixed>|null $seal
     */
    public function setSeal(?iterable $seal): self
    {
        $this->initialized['seal'] = true;
        $this->seal = $seal;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getDocument(): ?iterable
    {
        return $this->document;
    }

    /**
     * @param array<string, mixed>|null $document
     */
    public function setDocument(?iterable $document): self
    {
        $this->initialized['document'] = true;
        $this->document = $document;

        return $this;
    }
}
