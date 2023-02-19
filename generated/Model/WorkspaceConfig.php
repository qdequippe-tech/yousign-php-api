<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class WorkspaceConfig
{
    /**
     * @var string[]|null
     */
    protected $authenticationModes;
    /**
     * @var WorkspaceConfigProcedure|null
     */
    protected $procedure;
    /**
     * @var WorkspaceConfigEmail|null
     */
    protected $email;

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

    public function getProcedure(): ?WorkspaceConfigProcedure
    {
        return $this->procedure;
    }

    public function setProcedure(?WorkspaceConfigProcedure $procedure): self
    {
        $this->procedure = $procedure;

        return $this;
    }

    public function getEmail(): ?WorkspaceConfigEmail
    {
        return $this->email;
    }

    public function setEmail(?WorkspaceConfigEmail $email): self
    {
        $this->email = $email;

        return $this;
    }
}
