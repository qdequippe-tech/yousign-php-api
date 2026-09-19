<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignerSignWithUploadedSignatureImage implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $otp;
    /**
     * Signer's public IP address at the time of signing. Private IP addresses (e.g. 10.x.x.x, 172.16-31.x.x, 192.168.x.x) are not accepted, as a public IP is required to be recorded in the Audit Trail.
     *
     * @var string|null
     */
    protected $ipAddress;
    /**
     * UTC date. Must be in format `2024-01-18T22:00:00+00:00`.
     *
     * @var \DateTime|null
     */
    protected $consentGivenAt;
    /**
     * Signature image of the Signer to be displayed on the signed Document.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $signatureImage;

    public function getOtp(): ?string
    {
        return $this->otp;
    }

    public function setOtp(?string $otp): self
    {
        $this->initialized['otp'] = true;
        $this->otp = $otp;

        return $this;
    }

    /**
     * Signer's public IP address at the time of signing. Private IP addresses (e.g. 10.x.x.x, 172.16-31.x.x, 192.168.x.x) are not accepted, as a public IP is required to be recorded in the Audit Trail.
     *
     * @return string|null
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Signer's public IP address at the time of signing. Private IP addresses (e.g. 10.x.x.x, 172.16-31.x.x, 192.168.x.x) are not accepted, as a public IP is required to be recorded in the Audit Trail.
     *
     * @param string|null $ipAddress
     */
    public function setIpAddress($ipAddress): self
    {
        $this->initialized['ipAddress'] = true;
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * UTC date. Must be in format `2024-01-18T22:00:00+00:00`.
     */
    public function getConsentGivenAt(): ?\DateTime
    {
        return $this->consentGivenAt;
    }

    /**
     * UTC date. Must be in format `2024-01-18T22:00:00+00:00`.
     */
    public function setConsentGivenAt(?\DateTime $consentGivenAt): self
    {
        $this->initialized['consentGivenAt'] = true;
        $this->consentGivenAt = $consentGivenAt;

        return $this;
    }

    /**
     * Signature image of the Signer to be displayed on the signed Document.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getSignatureImage()
    {
        return $this->signatureImage;
    }

    /**
     * Signature image of the Signer to be displayed on the signed Document.
     *
     * @param string|resource|StreamInterface|null $signatureImage
     */
    public function setSignatureImage($signatureImage): self
    {
        $this->initialized['signatureImage'] = true;
        $this->signatureImage = $signatureImage;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['otp' => ['otp', 'getOtp', 'setOtp'], 'ipAddress' => ['ip_address', 'getIpAddress', 'setIpAddress'], 'consentGivenAt' => ['consent_given_at', 'getConsentGivenAt', 'setConsentGivenAt'], 'signatureImage' => ['signature_image', 'getSignatureImage', 'setSignatureImage']];
    }
}
