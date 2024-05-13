<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerAuditTrail extends \ArrayObject
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
     * @var array<string, mixed>|null
     */
    protected $signatureRequest;
    /**
     * @var array<string, mixed>|null
     */
    protected $sender;
    /**
     * @var array<string, mixed>|null
     */
    protected $signer;
    /**
     * @var list<array<string, mixed>>|null
     */
    protected $documents;
    /**
     * @var array<string, mixed>|null
     */
    protected $organization;
    /**
     * @var array<string, mixed>|null
     */
    protected $authentication;
    /**
     * @var array<string, mixed>|null
     */
    protected $electronicSignatureLevel;

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

    /**
     * @return array<string, mixed>|null
     */
    public function getSignatureRequest(): ?iterable
    {
        return $this->signatureRequest;
    }

    /**
     * @param array<string, mixed>|null $signatureRequest
     */
    public function setSignatureRequest(?iterable $signatureRequest): self
    {
        $this->initialized['signatureRequest'] = true;
        $this->signatureRequest = $signatureRequest;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getSender(): ?iterable
    {
        return $this->sender;
    }

    /**
     * @param array<string, mixed>|null $sender
     */
    public function setSender(?iterable $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getSigner(): ?iterable
    {
        return $this->signer;
    }

    /**
     * @param array<string, mixed>|null $signer
     */
    public function setSigner(?iterable $signer): self
    {
        $this->initialized['signer'] = true;
        $this->signer = $signer;

        return $this;
    }

    /**
     * @return list<array<string, mixed>>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * @param list<array<string, mixed>>|null $documents
     */
    public function setDocuments(?array $documents): self
    {
        $this->initialized['documents'] = true;
        $this->documents = $documents;

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
    public function getAuthentication(): ?iterable
    {
        return $this->authentication;
    }

    /**
     * @param array<string, mixed>|null $authentication
     */
    public function setAuthentication(?iterable $authentication): self
    {
        $this->initialized['authentication'] = true;
        $this->authentication = $authentication;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getElectronicSignatureLevel(): ?iterable
    {
        return $this->electronicSignatureLevel;
    }

    /**
     * @param array<string, mixed>|null $electronicSignatureLevel
     */
    public function setElectronicSignatureLevel(?iterable $electronicSignatureLevel): self
    {
        $this->initialized['electronicSignatureLevel'] = true;
        $this->electronicSignatureLevel = $electronicSignatureLevel;

        return $this;
    }
}
