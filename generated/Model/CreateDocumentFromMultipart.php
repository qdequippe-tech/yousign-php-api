<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateDocumentFromMultipart implements AdditionalPropertiesInterface
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
     * Binary file. Accepted formats: `PDF`, `DOCX`, `JPEG`, `JPG` and `PNG`. All files are converted to PDF upon upload.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * Can take two values: `signable_document` or `attachment`. Files in `JPEG`, `JPG`, and `PNG` format can only be of `attachment` nature.
     *
     * @var string|null
     */
    protected $nature;
    /**
     * Insert just after the position of the specified document id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * @var string|null
     */
    protected $password;
    /**
     * The document name. If not set, will use the uploaded document name. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var array<string, mixed>|null
     */
    protected $initials;
    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     *
     * @var bool|null
     */
    protected $parseAnchors = false;
    /**
     * If true, flattens PDF form fields, removing their interactivity/annotations before the document is processed.
     *
     * @var bool|null
     */
    protected $flatten = false;
    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @var list<string>|null
     */
    protected $excludedApprovers;
    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @var list<string>|null
     */
    protected $excludedSigners;

    /**
     * Binary file. Accepted formats: `PDF`, `DOCX`, `JPEG`, `JPG` and `PNG`. All files are converted to PDF upon upload.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Binary file. Accepted formats: `PDF`, `DOCX`, `JPEG`, `JPG` and `PNG`. All files are converted to PDF upon upload.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Can take two values: `signable_document` or `attachment`. Files in `JPEG`, `JPG`, and `PNG` format can only be of `attachment` nature.
     */
    public function getNature(): ?string
    {
        return $this->nature;
    }

    /**
     * Can take two values: `signable_document` or `attachment`. Files in `JPEG`, `JPG`, and `PNG` format can only be of `attachment` nature.
     */
    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified document id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    /**
     * The document name. If not set, will use the uploaded document name. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The document name. If not set, will use the uploaded document name. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getInitials(): ?iterable
    {
        return $this->initials;
    }

    /**
     * @param array<string, mixed>|null $initials
     */
    public function setInitials(?iterable $initials): self
    {
        $this->initialized['initials'] = true;
        $this->initials = $initials;

        return $this;
    }

    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     */
    public function getParseAnchors(): ?bool
    {
        return $this->parseAnchors;
    }

    /**
     * If true, the system will parse the document exclusively for Signature-type Smart Anchors and automatically generate the required fields.
     */
    public function setParseAnchors(?bool $parseAnchors): self
    {
        $this->initialized['parseAnchors'] = true;
        $this->parseAnchors = $parseAnchors;

        return $this;
    }

    /**
     * If true, flattens PDF form fields, removing their interactivity/annotations before the document is processed.
     */
    public function getFlatten(): ?bool
    {
        return $this->flatten;
    }

    /**
     * If true, flattens PDF form fields, removing their interactivity/annotations before the document is processed.
     */
    public function setFlatten(?bool $flatten): self
    {
        $this->initialized['flatten'] = true;
        $this->flatten = $flatten;

        return $this;
    }

    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedApprovers(): ?array
    {
        return $this->excludedApprovers;
    }

    /**
     * List of Approver IDs who cannot see this Document. When omitted, all Approvers can see it (default). Only available when the document_visibility feature is enabled on the organization.
     *
     * @param list<string>|null $excludedApprovers
     */
    public function setExcludedApprovers(?array $excludedApprovers): self
    {
        $this->initialized['excludedApprovers'] = true;
        $this->excludedApprovers = $excludedApprovers;

        return $this;
    }

    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedSigners(): ?array
    {
        return $this->excludedSigners;
    }

    /**
     * List of Signer IDs who cannot see this Document. When omitted, all Signers can see it (default). Requires the document_visibility feature to be enabled on the organization.
     *
     * @param list<string>|null $excludedSigners
     */
    public function setExcludedSigners(?array $excludedSigners): self
    {
        $this->initialized['excludedSigners'] = true;
        $this->excludedSigners = $excludedSigners;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile'], 'nature' => ['nature', 'getNature', 'setNature'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'password' => ['password', 'getPassword', 'setPassword'], 'name' => ['name', 'getName', 'setName'], 'initials' => ['initials', 'getInitials', 'setInitials'], 'parseAnchors' => ['parse_anchors', 'getParseAnchors', 'setParseAnchors'], 'flatten' => ['flatten', 'getFlatten', 'setFlatten'], 'excludedApprovers' => ['excluded_approvers', 'getExcludedApprovers', 'setExcludedApprovers'], 'excludedSigners' => ['excluded_signers', 'getExcludedSigners', 'setExcludedSigners']];
    }
}
