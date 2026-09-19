<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class OtpMessage implements AdditionalPropertiesInterface
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
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation. This value is a string composed of GSM characters supported by 7-bit encoding, must contain "{code}", the length must be less than 105 and cannot contain URL, email, phone number and IP address.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $customText;

    /**
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation. This value is a string composed of GSM characters supported by 7-bit encoding, must contain "{code}", the length must be less than 105 and cannot contain URL, email, phone number and IP address.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getCustomText(): ?string
    {
        return $this->customText;
    }

    /**
     * Custom text contained is the one-time password SMS sent to the Signer. This feature is available from SCALE plan, and disabled by default. Please contact [customer support](https://yousign.app/auth/workspace/help) to request an activation. This value is a string composed of GSM characters supported by 7-bit encoding, must contain "{code}", the length must be less than 105 and cannot contain URL, email, phone number and IP address.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setCustomText(?string $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['customText' => ['custom_text', 'getCustomText', 'setCustomText']];
    }
}
