<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomExperienceEmbeddedPreparationNavigationBar implements AdditionalPropertiesInterface
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
     * If true, the `Done` button is displayed in the navigation bar.
     *
     * @var bool|null
     */
    protected $doneButton;
    /**
     * If true, the `Back` button is displayed in the navigation bar.
     *
     * @var bool|null
     */
    protected $backButton;

    /**
     * If true, the `Done` button is displayed in the navigation bar.
     */
    public function getDoneButton(): ?bool
    {
        return $this->doneButton;
    }

    /**
     * If true, the `Done` button is displayed in the navigation bar.
     */
    public function setDoneButton(?bool $doneButton): self
    {
        $this->initialized['doneButton'] = true;
        $this->doneButton = $doneButton;

        return $this;
    }

    /**
     * If true, the `Back` button is displayed in the navigation bar.
     */
    public function getBackButton(): ?bool
    {
        return $this->backButton;
    }

    /**
     * If true, the `Back` button is displayed in the navigation bar.
     */
    public function setBackButton(?bool $backButton): self
    {
        $this->initialized['backButton'] = true;
        $this->backButton = $backButton;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['doneButton' => ['done_button', 'getDoneButton', 'setDoneButton'], 'backButton' => ['back_button', 'getBackButton', 'setBackButton']];
    }
}
