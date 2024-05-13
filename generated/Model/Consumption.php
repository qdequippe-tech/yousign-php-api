<?php

namespace Qdequippe\Yousign\Api\Model;

class Consumption extends \ArrayObject
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
     * @var ConsumptionApp|null
     */
    protected $app;
    /**
     * @var ConsumptionApi|null
     */
    protected $api;
    /**
     * @var ConsumptionApp|null
     */
    protected $connector;

    public function getApp(): ?ConsumptionApp
    {
        return $this->app;
    }

    public function setApp(?ConsumptionApp $app): self
    {
        $this->initialized['app'] = true;
        $this->app = $app;

        return $this;
    }

    public function getApi(): ?ConsumptionApi
    {
        return $this->api;
    }

    public function setApi(?ConsumptionApi $api): self
    {
        $this->initialized['api'] = true;
        $this->api = $api;

        return $this;
    }

    public function getConnector(): ?ConsumptionApp
    {
        return $this->connector;
    }

    public function setConnector(?ConsumptionApp $connector): self
    {
        $this->initialized['connector'] = true;
        $this->connector = $connector;

        return $this;
    }
}
