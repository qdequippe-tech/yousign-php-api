<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureConfigEmail
{
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $procedureStarted;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $procedureFinished;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $procedureRefused;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $procedureExpired;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $procedureDeleted;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $memberStarted;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $memberFinished;
    /**
     * @var ConfigEmailTemplate[]|null
     */
    protected $commentCreated;

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getProcedureStarted(): ?array
    {
        return $this->procedureStarted;
    }

    /**
     * @param ConfigEmailTemplate[]|null $procedureStarted
     */
    public function setProcedureStarted(?array $procedureStarted): self
    {
        $this->procedureStarted = $procedureStarted;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getProcedureFinished(): ?array
    {
        return $this->procedureFinished;
    }

    /**
     * @param ConfigEmailTemplate[]|null $procedureFinished
     */
    public function setProcedureFinished(?array $procedureFinished): self
    {
        $this->procedureFinished = $procedureFinished;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getProcedureRefused(): ?array
    {
        return $this->procedureRefused;
    }

    /**
     * @param ConfigEmailTemplate[]|null $procedureRefused
     */
    public function setProcedureRefused(?array $procedureRefused): self
    {
        $this->procedureRefused = $procedureRefused;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getProcedureExpired(): ?array
    {
        return $this->procedureExpired;
    }

    /**
     * @param ConfigEmailTemplate[]|null $procedureExpired
     */
    public function setProcedureExpired(?array $procedureExpired): self
    {
        $this->procedureExpired = $procedureExpired;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getProcedureDeleted(): ?array
    {
        return $this->procedureDeleted;
    }

    /**
     * @param ConfigEmailTemplate[]|null $procedureDeleted
     */
    public function setProcedureDeleted(?array $procedureDeleted): self
    {
        $this->procedureDeleted = $procedureDeleted;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getMemberStarted(): ?array
    {
        return $this->memberStarted;
    }

    /**
     * @param ConfigEmailTemplate[]|null $memberStarted
     */
    public function setMemberStarted(?array $memberStarted): self
    {
        $this->memberStarted = $memberStarted;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getMemberFinished(): ?array
    {
        return $this->memberFinished;
    }

    /**
     * @param ConfigEmailTemplate[]|null $memberFinished
     */
    public function setMemberFinished(?array $memberFinished): self
    {
        $this->memberFinished = $memberFinished;

        return $this;
    }

    /**
     * @return ConfigEmailTemplate[]|null
     */
    public function getCommentCreated(): ?array
    {
        return $this->commentCreated;
    }

    /**
     * @param ConfigEmailTemplate[]|null $commentCreated
     */
    public function setCommentCreated(?array $commentCreated): self
    {
        $this->commentCreated = $commentCreated;

        return $this;
    }
}
