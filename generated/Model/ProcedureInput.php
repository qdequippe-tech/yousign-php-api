<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class ProcedureInput
{
    /**
     * Name of procedure.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Description of procedure.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Expiration date. The procedure will be out of usage after this date.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * Defines if the procedure is a template (if true). A template could be used by a procedure to get all properties of the template. Check parent parameter for more information.
     *
     * @var bool|null
     */
    protected $template;
    /**
     * Defines an order for the procedure process. If true, position of each member will be used to define the validation workflow.
     *
     * @var bool|null
     */
    protected $ordered;
    /**
     * Metadata of the file (do not forget to replace key1 and key2 by your own custom values).
     *
     * @var ProcedureInputMetadata|null
     */
    protected $metadata;
    /**
     * @var ProcedureConfig|null
     */
    protected $config;
    /**
     * List of members, REQUIRED if start field is true.
     *
     * @var MemberInput[]|null
     */
    protected $members;
    /**
     * Defines if the procedure has been started. If false, the procedure status will be draft.
     *
     * @var bool|null
     */
    protected $start = true;
    /**
     * Defines if related files are available. Used only for organization that have this option.
     *
     * @var bool|null
     */
    protected $relatedFilesEnable;
    /**
     * Defines if the files of the procedure must be archived (Organization should be allowed).
     *
     * @var bool|null
     */
    protected $archive = false;

    /**
     * Name of procedure.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of procedure.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Description of procedure.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description of procedure.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Expiration date. The procedure will be out of usage after this date.
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    /**
     * Expiration date. The procedure will be out of usage after this date.
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Defines if the procedure is a template (if true). A template could be used by a procedure to get all properties of the template. Check parent parameter for more information.
     */
    public function getTemplate(): ?bool
    {
        return $this->template;
    }

    /**
     * Defines if the procedure is a template (if true). A template could be used by a procedure to get all properties of the template. Check parent parameter for more information.
     */
    public function setTemplate(?bool $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Defines an order for the procedure process. If true, position of each member will be used to define the validation workflow.
     */
    public function getOrdered(): ?bool
    {
        return $this->ordered;
    }

    /**
     * Defines an order for the procedure process. If true, position of each member will be used to define the validation workflow.
     */
    public function setOrdered(?bool $ordered): self
    {
        $this->ordered = $ordered;

        return $this;
    }

    /**
     * Metadata of the file (do not forget to replace key1 and key2 by your own custom values).
     */
    public function getMetadata(): ?ProcedureInputMetadata
    {
        return $this->metadata;
    }

    /**
     * Metadata of the file (do not forget to replace key1 and key2 by your own custom values).
     */
    public function setMetadata(?ProcedureInputMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getConfig(): ?ProcedureConfig
    {
        return $this->config;
    }

    public function setConfig(?ProcedureConfig $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * List of members, REQUIRED if start field is true.
     *
     * @return MemberInput[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * List of members, REQUIRED if start field is true.
     *
     * @param MemberInput[]|null $members
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;

        return $this;
    }

    /**
     * Defines if the procedure has been started. If false, the procedure status will be draft.
     */
    public function getStart(): ?bool
    {
        return $this->start;
    }

    /**
     * Defines if the procedure has been started. If false, the procedure status will be draft.
     */
    public function setStart(?bool $start): self
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Defines if related files are available. Used only for organization that have this option.
     */
    public function getRelatedFilesEnable(): ?bool
    {
        return $this->relatedFilesEnable;
    }

    /**
     * Defines if related files are available. Used only for organization that have this option.
     */
    public function setRelatedFilesEnable(?bool $relatedFilesEnable): self
    {
        $this->relatedFilesEnable = $relatedFilesEnable;

        return $this;
    }

    /**
     * Defines if the files of the procedure must be archived (Organization should be allowed).
     */
    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    /**
     * Defines if the files of the procedure must be archived (Organization should be allowed).
     */
    public function setArchive(?bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
