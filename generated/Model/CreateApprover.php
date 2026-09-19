<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateApprover implements AdditionalPropertiesInterface
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
     * Custom Text.
     *
     * @var CustomText|null
     */
    protected $customText;
    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be an approver. `ordered_approvers` must be enabled on the Signature Request.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     *
     * @var string|null
     */
    protected $groupWithId;
    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
     *
     * @var list<string>|null
     */
    protected $excludedDocuments;

    /**
     * Custom Text.
     */
    public function getCustomText(): ?CustomText
    {
        return $this->customText;
    }

    /**
     * Custom Text.
     */
    public function setCustomText(?CustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be an approver. `ordered_approvers` must be enabled on the Signature Request.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be an approver. `ordered_approvers` must be enabled on the Signature Request.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     */
    public function getGroupWithId(): ?string
    {
        return $this->groupWithId;
    }

    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     */
    public function setGroupWithId(?string $groupWithId): self
    {
        $this->initialized['groupWithId'] = true;
        $this->groupWithId = $groupWithId;

        return $this;
    }

    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedDocuments(): ?array
    {
        return $this->excludedDocuments;
    }

    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
     *
     * @param list<string>|null $excludedDocuments
     */
    public function setExcludedDocuments(?array $excludedDocuments): self
    {
        $this->initialized['excludedDocuments'] = true;
        $this->excludedDocuments = $excludedDocuments;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['customText' => ['custom_text', 'getCustomText', 'setCustomText'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'groupWithId' => ['group_with_id', 'getGroupWithId', 'setGroupWithId'], 'excludedDocuments' => ['excluded_documents', 'getExcludedDocuments', 'setExcludedDocuments']];
    }
}
