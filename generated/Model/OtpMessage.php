<?php

namespace Qdequippe\Yousign\Api\Model;

class OtpMessage extends \ArrayObject
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
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation.
     *
     * @var string|null
     */
    protected $customText;

    /**
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation.
     */
    public function getCustomText(): ?string
    {
        return $this->customText;
    }

    /**
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation.
     */
    public function setCustomText(?string $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }
}
