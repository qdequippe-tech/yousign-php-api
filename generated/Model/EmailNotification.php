<?php

namespace Qdequippe\Yousign\Api\Model;

class EmailNotification extends \ArrayObject
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
     * List of disabled email notifications.
     *
     * @var list<string>|null
     */
    protected $disabled;

    /**
     * List of disabled email notifications.
     *
     * @return list<string>|null
     */
    public function getDisabled(): ?array
    {
        return $this->disabled;
    }

    /**
     * List of disabled email notifications.
     *
     * @param list<string>|null $disabled
     */
    public function setDisabled(?array $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;

        return $this;
    }
}
