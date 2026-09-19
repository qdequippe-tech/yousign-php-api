<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;

class SignerIdentityVerification
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
     * Type of document you are looking to verify. Only passports, id and resident permits are accepted.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Front of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $recto;
    /**
     * Back of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $verso;

    /**
     * Type of document you are looking to verify. Only passports, id and resident permits are accepted.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of document you are looking to verify. Only passports, id and resident permits are accepted.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Front of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getRecto()
    {
        return $this->recto;
    }

    /**
     * Front of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @param string|resource|StreamInterface|null $recto
     */
    public function setRecto($recto): self
    {
        $this->initialized['recto'] = true;
        $this->recto = $recto;

        return $this;
    }

    /**
     * Back of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getVerso()
    {
        return $this->verso;
    }

    /**
     * Back of the identity document file to verify.
     * Accepted formats: PNG, JPEG, JPG, PDF.
     * Max size: 10 MB. Max resolution: 20 mpx.
     *
     * @param string|resource|StreamInterface|null $verso
     */
    public function setVerso($verso): self
    {
        $this->initialized['verso'] = true;
        $this->verso = $verso;

        return $this;
    }
}
