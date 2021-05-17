<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class WorkspaceConfigProcedure
{
    /**
     * @var string[]|null
     */
    protected $authenticationModes;

    /**
     * @return string[]|null
     */
    public function getAuthenticationModes(): ?array
    {
        return $this->authenticationModes;
    }

    /**
     * @param string[]|null $authenticationModes
     */
    public function setAuthenticationModes(?array $authenticationModes): self
    {
        $this->authenticationModes = $authenticationModes;

        return $this;
    }
}
