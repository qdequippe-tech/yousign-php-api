<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest implements AdditionalPropertiesInterface
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
     * Accepted formats: PDF, DOCX, JPEG, JPG and PNG. All files are converted to PDF upon upload.
     * If the Document nature is signable_document, only PDF or DOCX file formats are allowed.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * The document name. If not set, will use the uploaded document name. This value should contain any characters except "\", "/" and can\'t start and finish with a space.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Accepted formats: PDF, DOCX, JPEG, JPG and PNG. All files are converted to PDF upon upload.
     * If the Document nature is signable_document, only PDF or DOCX file formats are allowed.
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Accepted formats: PDF, DOCX, JPEG, JPG and PNG. All files are converted to PDF upon upload.
     * If the Document nature is signable_document, only PDF or DOCX file formats are allowed.
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

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile'], 'name' => ['name', 'getName', 'setName']];
    }
}
