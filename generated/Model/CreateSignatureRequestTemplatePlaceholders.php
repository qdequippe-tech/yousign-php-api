<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignatureRequestTemplatePlaceholders extends \ArrayObject
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
     * Substituting data for placeholder signers.
     *
     * @var list<SignatureRequestPlaceholderSignerSubstituteFromInfoInput>|list<SignatureRequestPlaceholderSignerSubstituteFromUserIdInput>|list<SignatureRequestPlaceholderSignerSubstituteFromContactIdInput>|null
     */
    protected $signers;

    /**
     * Substituting data for placeholder signers.
     *
     * @return list<SignatureRequestPlaceholderSignerSubstituteFromInfoInput>|list<SignatureRequestPlaceholderSignerSubstituteFromUserIdInput>|list<SignatureRequestPlaceholderSignerSubstituteFromContactIdInput>|null
     */
    public function getSigners(): ?array
    {
        return $this->signers;
    }

    /**
     * Substituting data for placeholder signers.
     *
     * @param list<SignatureRequestPlaceholderSignerSubstituteFromInfoInput>|list<SignatureRequestPlaceholderSignerSubstituteFromUserIdInput>|list<SignatureRequestPlaceholderSignerSubstituteFromContactIdInput>|null $signers
     */
    public function setSigners(?array $signers): self
    {
        $this->initialized['signers'] = true;
        $this->signers = $signers;

        return $this;
    }
}
