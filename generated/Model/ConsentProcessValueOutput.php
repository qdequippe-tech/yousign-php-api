<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ConsentProcessValueOutput
{
    /**
     * id of object.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Consent process attached to concent process value.
     *
     * @var string|null
     */
    protected $consentProcess;
    /**
     * Member attached to concent process value.
     *
     * @var string|null
     */
    protected $member;
    /**
     * Value of concent process value.
     *
     * @var string|null
     */
    protected $value;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;

    /**
     * id of object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * id of object.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Consent process attached to concent process value.
     */
    public function getConsentProcess(): ?string
    {
        return $this->consentProcess;
    }

    /**
     * Consent process attached to concent process value.
     */
    public function setConsentProcess(?string $consentProcess): self
    {
        $this->consentProcess = $consentProcess;

        return $this;
    }

    /**
     * Member attached to concent process value.
     */
    public function getMember(): ?string
    {
        return $this->member;
    }

    /**
     * Member attached to concent process value.
     */
    public function setMember(?string $member): self
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Value of concent process value.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Value of concent process value.
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
