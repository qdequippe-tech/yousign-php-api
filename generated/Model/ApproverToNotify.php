<?php

namespace Qdequippe\Yousign\Api\Model;

class ApproverToNotify extends \ArrayObject
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
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $approvalLink;
    /**
     * @var \DateTime|null
     */
    protected $approvalLinkExpirationDate;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getApprovalLink(): ?string
    {
        return $this->approvalLink;
    }

    public function setApprovalLink(?string $approvalLink): self
    {
        $this->initialized['approvalLink'] = true;
        $this->approvalLink = $approvalLink;

        return $this;
    }

    public function getApprovalLinkExpirationDate(): ?\DateTime
    {
        return $this->approvalLinkExpirationDate;
    }

    public function setApprovalLinkExpirationDate(?\DateTime $approvalLinkExpirationDate): self
    {
        $this->initialized['approvalLinkExpirationDate'] = true;
        $this->approvalLinkExpirationDate = $approvalLinkExpirationDate;

        return $this;
    }
}
