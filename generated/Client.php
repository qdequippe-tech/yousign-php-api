<?php

namespace Qdequippe\Yousign\Api;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Endpoint\DeleteContactsContactId;
use Qdequippe\Yousign\Api\Endpoint\DeleteCustomExperience;
use Qdequippe\Yousign\Api\Endpoint\DeleteCustomExperienceLogo;
use Qdequippe\Yousign\Api\Endpoint\DeleteElectronicSealImage;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdApproversApproverId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\DeleteWebhooksWebhookId;
use Qdequippe\Yousign\Api\Endpoint\DeleteWorkspaceWorkspaceIdUsersUserId;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealDocument;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealImage;
use Qdequippe\Yousign\Api\Endpoint\GetArchivesArchivedFileIdDownload;
use Qdequippe\Yousign\Api\Endpoint\GetConsumptions;
use Qdequippe\Yousign\Api\Endpoint\GetConsumptionsExport;
use Qdequippe\Yousign\Api\Endpoint\GetContacts;
use Qdequippe\Yousign\Api\Endpoint\GetContactsContactId;
use Qdequippe\Yousign\Api\Endpoint\GetCustomExperiences;
use Qdequippe\Yousign\Api\Endpoint\GetCustomExperiencesCustomExperienceId;
use Qdequippe\Yousign\Api\Endpoint\GetElectronicSeal;
use Qdequippe\Yousign\Api\Endpoint\GetElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequests;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestId;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdApproversApproverId;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdAuditTrailsDownload;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdDocumentsDownload;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdFollowers;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdSigners;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentId;
use Qdequippe\Yousign\Api\Endpoint\GetSignersSignerIdAuditTrailsDownload;
use Qdequippe\Yousign\Api\Endpoint\GetSignersSignersId;
use Qdequippe\Yousign\Api\Endpoint\GetTemplates;
use Qdequippe\Yousign\Api\Endpoint\GetUsers;
use Qdequippe\Yousign\Api\Endpoint\GetWebhooks;
use Qdequippe\Yousign\Api\Endpoint\GetWebhooksWebhookId;
use Qdequippe\Yousign\Api\Endpoint\GetWorkspaces;
use Qdequippe\Yousign\Api\Endpoint\GetWorkspacesDefault;
use Qdequippe\Yousign\Api\Endpoint\GetWorkspacesWorkspaceId;
use Qdequippe\Yousign\Api\Endpoint\ListElectronicSealImages;
use Qdequippe\Yousign\Api\Endpoint\PatchContactsContactId;
use Qdequippe\Yousign\Api\Endpoint\PatchCustomExperienceLogo;
use Qdequippe\Yousign\Api\Endpoint\PatchCustomExperiencesCustomExperienceId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdApproversApproverId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\PatchWebhooksWebhookId;
use Qdequippe\Yousign\Api\Endpoint\PatchWorkspacesWorkspaceId;
use Qdequippe\Yousign\Api\Endpoint\PostArchives;
use Qdequippe\Yousign\Api\Endpoint\PostContact;
use Qdequippe\Yousign\Api\Endpoint\PostCustomExperience;
use Qdequippe\Yousign\Api\Endpoint\PostDocuments;
use Qdequippe\Yousign\Api\Endpoint\PostElectronicSeals;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequests;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdActivate;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdApprovers;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdCancel;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentRequests;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdFollowers;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdReactivate;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSigners;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSign;
use Qdequippe\Yousign\Api\Endpoint\PostWebhooksSubscriptions;
use Qdequippe\Yousign\Api\Endpoint\PostWorkspace;
use Qdequippe\Yousign\Api\Endpoint\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\PutSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\PutWorkspacesWorkspaceIdUsers;
use Qdequippe\Yousign\Api\Endpoint\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Model\CreateCustomExperience;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromMultipart;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\CreateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\CreateWorkspace;
use Qdequippe\Yousign\Api\Model\DeleteWorkspace;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\Follower;
use Qdequippe\Yousign\Api\Model\MarkWorkspaceAsDefault;
use Qdequippe\Yousign\Api\Model\PatchCustomExperienceLogoRequest;
use Qdequippe\Yousign\Api\Model\PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancelRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdReactivateRequest;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\UpdateWorkspace;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealImage;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
use Qdequippe\Yousign\Api\Normalizer\JaneObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

class Client extends Runtime\Client\Client
{
    /**
     * Archive a file in a secure digital safe for 10 years.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ArchivedFile|ResponseInterface|null
     *
     * @throws Exception\PostArchivesBadRequestException
     * @throws Exception\PostArchivesUnauthorizedException
     * @throws Exception\PostArchivesForbiddenException
     * @throws Exception\PostArchivesNotFoundException
     * @throws Exception\PostArchivesUnsupportedMediaTypeException
     */
    public function postArchives(?UploadArchivedFile $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostArchives($requestBody), $fetch);
    }

    /**
     * Download the archived file using the ArchivedFileId.
     *
     * @param string $archivedFileId ArchivedFileId
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept         Accept content header application/octet-stream|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetArchivesArchivedFileIdDownloadBadRequestException
     * @throws Exception\GetArchivesArchivedFileIdDownloadUnauthorizedException
     * @throws Exception\GetArchivesArchivedFileIdDownloadForbiddenException
     * @throws Exception\GetArchivesArchivedFileIdDownloadNotFoundException
     */
    public function getArchivesArchivedFileIdDownload(string $archivedFileId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetArchivesArchivedFileIdDownload($archivedFileId, $accept), $fetch);
    }

    /**
     * Get signatures Consumption by source.
     *
     * @param array $queryParameters {
     *
     * @var string $from The "from" date must not be more than 1 year in the past
     * @var string $to The "to" date must be more recent than the "from" date
     * @var string $authentication_key
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Consumption|ResponseInterface|null
     *
     * @throws Exception\GetConsumptionsBadRequestException
     * @throws Exception\GetConsumptionsUnauthorizedException
     * @throws Exception\GetConsumptionsForbiddenException
     * @throws Exception\GetConsumptionsNotFoundException
     */
    public function getConsumptions(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetConsumptions($queryParameters), $fetch);
    }

    /**
     * Get a binary .csv file containing all the Consumption data of the underlying signatures.
     *
     * @param array $queryParameters {
     *
     * @var string $from The "from" date must not be more than 1 year in the past
     * @var string $to The "to" date must be more recent than the "from" date
     * @var string $authentication_key
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header text/csv|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetConsumptionsExportBadRequestException
     * @throws Exception\GetConsumptionsExportUnauthorizedException
     * @throws Exception\GetConsumptionsExportForbiddenException
     * @throws Exception\GetConsumptionsExportNotFoundException
     */
    public function getConsumptionsExport(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetConsumptionsExport($queryParameters, $accept), $fetch);
    }

    /**
     * Returns the list of all the Contacts within your organization.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetContacts200Response|ResponseInterface|null
     *
     * @throws Exception\GetContactsBadRequestException
     * @throws Exception\GetContactsUnauthorizedException
     * @throws Exception\GetContactsForbiddenException
     */
    public function getContacts(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetContacts($queryParameters), $fetch);
    }

    /**
     * Creates a new Contact.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Contact|ResponseInterface|null
     *
     * @throws Exception\PostContactBadRequestException
     * @throws Exception\PostContactUnauthorizedException
     * @throws Exception\PostContactForbiddenException
     * @throws Exception\PostContactNotFoundException
     */
    public function postContact(?CreateContact $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostContact($requestBody), $fetch);
    }

    /**
     * Deletes a given Contact.
     *
     * @param string $contactId Contact Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteContactsContactIdUnauthorizedException
     * @throws Exception\DeleteContactsContactIdForbiddenException
     * @throws Exception\DeleteContactsContactIdNotFoundException
     */
    public function deleteContactsContactId(string $contactId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteContactsContactId($contactId), $fetch);
    }

    /**
     * Retrieves a given Contact.
     *
     * @param string $contactId Contact Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Contact|ResponseInterface|null
     *
     * @throws Exception\GetContactsContactIdNotFoundException
     */
    public function getContactsContactId(string $contactId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetContactsContactId($contactId), $fetch);
    }

    /**
     * Updates a given Contact.
     * Any parameters not provided are left unchanged.
     *
     * @param string $contactId Contact Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Contact|ResponseInterface|null
     *
     * @throws Exception\PatchContactsContactIdBadRequestException
     * @throws Exception\PatchContactsContactIdUnauthorizedException
     * @throws Exception\PatchContactsContactIdForbiddenException
     * @throws Exception\PatchContactsContactIdNotFoundException
     * @throws Exception\PatchContactsContactIdUnsupportedMediaTypeException
     */
    public function patchContactsContactId(string $contactId, ?UpdateContact $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchContactsContactId($contactId, $requestBody), $fetch);
    }

    /**
     * Returns the list of all Custom Experiences in your Organization.
     * You can limit the number of items returned by using pagination.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetCustomExperiences200Response|ResponseInterface|null
     *
     * @throws Exception\GetCustomExperiencesBadRequestException
     * @throws Exception\GetCustomExperiencesUnauthorizedException
     * @throws Exception\GetCustomExperiencesForbiddenException
     */
    public function getCustomExperiences(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetCustomExperiences($queryParameters), $fetch);
    }

    /**
     * Creates a new Custom Experience.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PostCustomExperienceBadRequestException
     * @throws Exception\PostCustomExperienceUnauthorizedException
     * @throws Exception\PostCustomExperienceForbiddenException
     * @throws Exception\PostCustomExperienceUnsupportedMediaTypeException
     */
    public function postCustomExperience(?CreateCustomExperience $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostCustomExperience($requestBody), $fetch);
    }

    /**
     * Deletes a given Custom Experience.
     *
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteCustomExperienceBadRequestException
     * @throws Exception\DeleteCustomExperienceUnauthorizedException
     * @throws Exception\DeleteCustomExperienceForbiddenException
     * @throws Exception\DeleteCustomExperienceNotFoundException
     */
    public function deleteCustomExperience(string $customExperienceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteCustomExperience($customExperienceId), $fetch);
    }

    /**
     * Retrieves a given Custom Experience.
     *
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\GetCustomExperiencesCustomExperienceIdBadRequestException
     * @throws Exception\GetCustomExperiencesCustomExperienceIdUnauthorizedException
     * @throws Exception\GetCustomExperiencesCustomExperienceIdForbiddenException
     * @throws Exception\GetCustomExperiencesCustomExperienceIdNotFoundException
     */
    public function getCustomExperiencesCustomExperienceId(string $customExperienceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetCustomExperiencesCustomExperienceId($customExperienceId), $fetch);
    }

    /**
     * Updates a given Custom Experience.
     * Any parameters not provided are left unchanged.
     *
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdBadRequestException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdUnauthorizedException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdForbiddenException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdNotFoundException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdUnsupportedMediaTypeException
     */
    public function patchCustomExperiencesCustomExperienceId(string $customExperienceId, ?UpdateCustomExperience $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchCustomExperiencesCustomExperienceId($customExperienceId, $requestBody), $fetch);
    }

    /**
     * Deletes the logo of a Custom Experience.
     *
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteCustomExperienceLogoBadRequestException
     * @throws Exception\DeleteCustomExperienceLogoUnauthorizedException
     * @throws Exception\DeleteCustomExperienceLogoForbiddenException
     * @throws Exception\DeleteCustomExperienceLogoNotFoundException
     */
    public function deleteCustomExperienceLogo(string $customExperienceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteCustomExperienceLogo($customExperienceId), $fetch);
    }

    /**
     * Updates the logo of a given Custom Experience by uploading the image of your choice.
     *
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PatchCustomExperienceLogoBadRequestException
     * @throws Exception\PatchCustomExperienceLogoUnauthorizedException
     * @throws Exception\PatchCustomExperienceLogoForbiddenException
     * @throws Exception\PatchCustomExperienceLogoUnsupportedMediaTypeException
     */
    public function patchCustomExperienceLogo(string $customExperienceId, ?PatchCustomExperienceLogoRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchCustomExperienceLogo($customExperienceId, $requestBody), $fetch);
    }

    /**
     * Deprecated endpoint, do not use.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PostDocumentsBadRequestException
     * @throws Exception\PostDocumentsUnauthorizedException
     * @throws Exception\PostDocumentsForbiddenException
     * @throws Exception\PostDocumentsUnsupportedMediaTypeException
     */
    public function postDocuments(?CreateDocumentFromMultipart $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostDocuments($requestBody), $fetch);
    }

    /**
     * Upload an Electronic Seal Document to use for creating an Electronic Seal (can be used for only one Electronic Seal).
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSealDocument|ResponseInterface|null
     *
     * @throws Exception\UploadElectronicSealDocumentBadRequestException
     * @throws Exception\UploadElectronicSealDocumentUnauthorizedException
     * @throws Exception\UploadElectronicSealDocumentForbiddenException
     * @throws Exception\UploadElectronicSealDocumentUnsupportedMediaTypeException
     */
    public function uploadElectronicSealDocument(?UploadElectronicSealDocument $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\UploadElectronicSealDocument($requestBody), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DownloadElectronicSealDocumentUnauthorizedException
     * @throws Exception\DownloadElectronicSealDocumentNotFoundException
     */
    public function downloadElectronicSealDocument(string $electronicSealDocumentId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new DownloadElectronicSealDocument($electronicSealDocumentId, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ListElectronicSealImages200Response|ResponseInterface|null
     *
     * @throws Exception\ListElectronicSealImagesBadRequestException
     * @throws Exception\ListElectronicSealImagesUnauthorizedException
     * @throws Exception\ListElectronicSealImagesForbiddenException
     */
    public function listElectronicSealImages(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ListElectronicSealImages($queryParameters), $fetch);
    }

    /**
     * Upload an Electronic Seal Image to use for creating an Electronic Seal (can be used for several Electronic Seals).
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSealImage|ResponseInterface|null
     *
     * @throws Exception\UploadElectronicSealImageBadRequestException
     * @throws Exception\UploadElectronicSealImageUnauthorizedException
     * @throws Exception\UploadElectronicSealImageForbiddenException
     * @throws Exception\UploadElectronicSealImageUnsupportedMediaTypeException
     */
    public function uploadElectronicSealImage(?UploadElectronicSealImage $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\UploadElectronicSealImage($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteElectronicSealImageUnauthorizedException
     * @throws Exception\DeleteElectronicSealImageForbiddenException
     * @throws Exception\DeleteElectronicSealImageNotFoundException
     */
    public function deleteElectronicSealImage(string $electronicSealImageId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteElectronicSealImage($electronicSealImageId), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header image/png|image/jpg|image/gif|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DownloadElectronicSealImageUnauthorizedException
     * @throws Exception\DownloadElectronicSealImageNotFoundException
     */
    public function downloadElectronicSealImage(string $electronicSealImageId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new DownloadElectronicSealImage($electronicSealImageId, $accept), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSeal|ResponseInterface|null
     *
     * @throws Exception\PostElectronicSealsBadRequestException
     * @throws Exception\PostElectronicSealsUnauthorizedException
     * @throws Exception\PostElectronicSealsForbiddenException
     * @throws Exception\PostElectronicSealsUnsupportedMediaTypeException
     */
    public function postElectronicSeals(?CreateElectronicSealPayload $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostElectronicSeals($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSeal|ResponseInterface|null
     *
     * @throws Exception\GetElectronicSealUnauthorizedException
     * @throws Exception\GetElectronicSealNotFoundException
     */
    public function getElectronicSeal(string $electronicSealId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetElectronicSeal($electronicSealId), $fetch);
    }

    /**
     * Electronic Seal Audit Trail is only available when the Electronic Seal is "done".
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSealAuditTrail|ResponseInterface|null
     *
     * @throws Exception\GetElectronicSealAuditTrailBadRequestException
     * @throws Exception\GetElectronicSealAuditTrailUnauthorizedException
     * @throws Exception\GetElectronicSealAuditTrailForbiddenException
     * @throws Exception\GetElectronicSealAuditTrailNotFoundException
     */
    public function getElectronicSealAuditTrail(string $electronicSealId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetElectronicSealAuditTrail($electronicSealId), $fetch);
    }

    /**
     * Electronic Seal Audit Trail is only available when the Electronic Seal is "done".
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DownloadElectronicSealAuditTrailBadRequestException
     * @throws Exception\DownloadElectronicSealAuditTrailUnauthorizedException
     * @throws Exception\DownloadElectronicSealAuditTrailForbiddenException
     * @throws Exception\DownloadElectronicSealAuditTrailNotFoundException
     */
    public function downloadElectronicSealAuditTrail(string $electronicSealId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new DownloadElectronicSealAuditTrail($electronicSealId, $accept), $fetch);
    }

    /**
     * Returns the list of all Signatures Requests in your organization. You can limit the number of items returned by using filters and pagination.
     *
     * @param array $queryParameters {
     *
     * @var string $status Filter by status
     * @var string $after After cursor (pagination)
     * @var int    $limit the limit of items count to retrieve
     * @var string $external_id Filter by external_id
     * @var array  $source[] Filter by source
     * @var string $q Search on name
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetSignatureRequests200Response|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsBadRequestException
     * @throws Exception\GetSignatureRequestsUnauthorizedException
     * @throws Exception\GetSignatureRequestsForbiddenException
     */
    public function getSignatureRequests(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequests($queryParameters), $fetch);
    }

    /**
     * Creates a new Signature Request resource.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsBadRequestException
     * @throws Exception\PostSignatureRequestsUnauthorizedException
     * @throws Exception\PostSignatureRequestsForbiddenException
     * @throws Exception\PostSignatureRequestsNotFoundException
     * @throws Exception\PostSignatureRequestsUnsupportedMediaTypeException
     */
    public function postSignatureRequests(?CreateSignatureRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequests($requestBody), $fetch);
    }

    /**
     * Deletes a given Signature Request, not possible if the Signature Request is in `approval` and `ongoing` status.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var bool $permanent_delete If true it will permanently delete the Signature Request. It will no longer be retrievable.
     *           }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestId(string $signatureRequestId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestId($signatureRequestId, $queryParameters), $fetch);
    }

    /**
     * Retrieves a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdNotFoundException
     */
    public function getSignatureRequestsSignatureRequestId(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestId($signatureRequestId), $fetch);
    }

    /**
     * Updates a given Signature Request. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdBadRequestException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdUnauthorizedException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdForbiddenException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdNotFoundException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdUnsupportedMediaTypeException
     */
    public function patchSignatureRequestsSignatureRequestId(string $signatureRequestId, ?UpdateSignatureRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestId($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Activates a Signature request, so it is not in `draft` status anymore.
     * If the `delivery_mode` is not `null`, activating the Signature Request will trigger the notifications to Approvers/Followers/Signers.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequestActivated|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdActivateBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdActivateUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdActivateForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdActivateNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdActivate(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdActivate($signatureRequestId), $fetch);
    }

    /**
     * Adds an Approver to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Approver|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdApprovers(string $signatureRequestId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdApprovers($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Deletes a given Approver from a Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdApproversApproverId(string $signatureRequestId, string $approverId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId), $fetch);
    }

    /**
     * Retrieves a given Approver.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Approver|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdApproversApproverId(string $signatureRequestId, string $approverId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId), $fetch);
    }

    /**
     * Updates a given Approver. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Approver|ResponseInterface|null
     *
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException
     */
    public function patchSignatureRequestsSignatureRequestIdApproversApproverId(string $signatureRequestId, string $approverId, ?PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId, $requestBody), $fetch);
    }

    /**
     * Sends a reminder to a given Approver to review their Signature Request.
     * Only possible when the Signature Request status is `approval` and the Approver status is `notified`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder(string $signatureRequestId, string $approverId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder($signatureRequestId, $approverId), $fetch);
    }

    /**
     * Download the PDF version of all the Audit Trails attached to a given Signature Request. Each Audit Trail is bound to a different Signer. Only possible when the Signature Request status is `done`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var bool $merge Download all Audit Trails merged as a single PDF file
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/zip, application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdAuditTrailsDownload(string $signatureRequestId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdAuditTrailsDownload($signatureRequestId, $queryParameters, $accept), $fetch);
    }

    /**
     * Cancels a Signature Request when it is in `approval` or `ongoing` status. A canceled Signature Request cannot be reactivated.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdCancel(string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdCancelRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdCancel($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Adds a Signer Document Request to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignerDocumentRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdDocumentRequests(string $signatureRequestId, ?CreateSignerDocumentRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentRequests($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Delete a Signer Document Request from signature request. This action is only permitted when the Signature Request is a draft.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestId(string $signatureRequestId, string $documentRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestId($signatureRequestId, $documentRequestId), $fetch);
    }

    /**
     * Remove a Signer to a given Signer Document Request. This action is only permitted when the Signature Request is a draft.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId(string $signatureRequestId, string $documentRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId($signatureRequestId, $documentRequestId, $signerId), $fetch);
    }

    /**
     * Adds a Signer to a given Signer Document Request. This action is only permitted when the Signature Request is a draft.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignerDocumentRequest|ResponseInterface|null
     *
     * @throws Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException
     */
    public function putSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId(string $signatureRequestId, string $documentRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId($signatureRequestId, $documentRequestId, $signerId), $fetch);
    }

    /**
     * Returns a list of Documents for a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var string $nature Filter by nature
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document[]|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdDocuments(string $signatureRequestId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $queryParameters), $fetch);
    }

    /**
     * Adds a Document to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdDocuments(string $signatureRequestId, ?CreateDocumentFromMultipart $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Downloads the PDF version of all Documents attached to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var string $version specify Documents version to download, `completed` is only available when the Signature Request status is `done`
     * @var bool   $archive Force zip archive download
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/zip, application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDownloadBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDownloadUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDownloadNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdDocumentsDownload(string $signatureRequestId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdDocumentsDownload($signatureRequestId, $queryParameters, $accept), $fetch);
    }

    /**
     * Deletes a given Document from a Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdDocumentsDocumentId(string $signatureRequestId, string $documentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId), $fetch);
    }

    /**
     * Retrieves a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdDocumentsDocumentId(string $signatureRequestId, string $documentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId), $fetch);
    }

    /**
     * Updates a given Document. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdBadRequestException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnsupportedMediaTypeException
     */
    public function patchSignatureRequestsSignatureRequestIdDocumentsDocumentId(string $signatureRequestId, string $documentId, ?UpdateDocument $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
     * Downloads the PDF version of a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept             Accept content header application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload(string $signatureRequestId, string $documentId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload($signatureRequestId, $documentId, $accept), $fetch);
    }

    /**
     * Returns a list of Fields for a given Document. You can limit the number of items returned by using filters.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document ID
     * @param array  $queryParameters    {
     *
     * @var array  $types[] Filter by Field type
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields(string $signatureRequestId, string $documentId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields($signatureRequestId, $documentId, $queryParameters), $fetch);
    }

    /**
     * Adds a Field to a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document ID
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields(string $signatureRequestId, string $documentId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
     * Deletes a given Field from a Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fieldId            Field Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId(string $signatureRequestId, string $documentId, string $fieldId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId($signatureRequestId, $documentId, $fieldId), $fetch);
    }

    /**
     * Updates a given Field. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fieldId            Field Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException
     * @throws Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException
     * @throws Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException
     * @throws Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException
     * @throws Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException
     */
    public function updateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId(string $signatureRequestId, string $documentId, string $fieldId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId($signatureRequestId, $documentId, $fieldId, $requestBody), $fetch);
    }

    /**
     * Replace the file of a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace(string $signatureRequestId, string $documentId, ?PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
     * Returns a list of Followers for a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetSignatureRequestsSignatureRequestIdFollowers200Response|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdFollowersUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdFollowersForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdFollowersNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdFollowers(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdFollowers($signatureRequestId), $fetch);
    }

    /**
     * Adds a Follower to a given Signature Request.
     *
     * @param string                      $signatureRequestId Signature Request Id
     * @param CreateFollowersInner[]|null $requestBody
     * @param string                      $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Follower[]|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdFollowersBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdFollowersUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdFollowersForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdFollowersNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdFollowersUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdFollowers(string $signatureRequestId, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdFollowers($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Deletes the Metadata of a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdMetadataNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdMetadata($signatureRequestId), $fetch);
    }

    /**
     * Retrieves the Metadata of a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Metadata|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdMetadataNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdMetadata($signatureRequestId), $fetch);
    }

    /**
     * Add Metadata to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Metadata|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId, ?CreateSignatureRequestMetadata $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdMetadata($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Updates the Metadata of a given Signature Request. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Metadata|ResponseInterface|null
     *
     * @throws Exception\PutSignatureRequestsSignatureRequestIdMetadataBadRequestException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws Exception\PutSignatureRequestsSignatureRequestIdMetadataNotFoundException
     */
    public function putSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId, ?UpdateSignatureRequestMetadata $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PutSignatureRequestsSignatureRequestIdMetadata($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Reactivates a Signature Request when it is in `expired` status.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdReactivate(string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdReactivateRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdReactivate($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Returns a list of Signers for a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Signer[]|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdSigners(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdSigners($signatureRequestId), $fetch);
    }

    /**
     * Adds a Signer to a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Signer|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdSigners(string $signatureRequestId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSigners($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * Deletes a given Signer from a Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdSignersSignerId(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdSignersSignerId($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Retrieves a given Signer.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Signer|ResponseInterface|null
     *
     * @throws Exception\GetSignersSignersIdUnauthorizedException
     * @throws Exception\GetSignersSignersIdForbiddenException
     * @throws Exception\GetSignersSignersIdNotFoundException
     */
    public function getSignersSignersId(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignersSignersId($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Updates a given Signer.
     * Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Signer|ResponseInterface|null
     *
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdBadRequestException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdForbiddenException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdNotFoundException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnsupportedMediaTypeException
     */
    public function patchSignatureRequestsSignatureRequestIdSignersSignerId(string $signatureRequestId, string $signerId, ?UpdateSigner $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdSignersSignerId($signatureRequestId, $signerId, $requestBody), $fetch);
    }

    /**
     * Retrieves the JSON version of the Audit Trail attached to a given Signer. Only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignerAuditTrail|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Download the PDF version of the Audit Trail attached to a given Signer. Only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept             Accept content header application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignersSignerIdAuditTrailsDownloadBadRequestException
     * @throws Exception\GetSignersSignerIdAuditTrailsDownloadUnauthorizedException
     * @throws Exception\GetSignersSignerIdAuditTrailsDownloadForbiddenException
     * @throws Exception\GetSignersSignerIdAuditTrailsDownloadNotFoundException
     */
    public function getSignersSignerIdAuditTrailsDownload(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignersSignerIdAuditTrailsDownload($signatureRequestId, $signerId, $accept), $fetch);
    }

    /**
     * Deletes all documents uploaded by a given Signer for a specific Signature Request.
     * Deletion is only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsBadRequestException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsUnauthorizedException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsForbiddenException
     * @throws Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsNotFoundException
     */
    public function deleteSignatureRequestsSignatureRequestIdSignersSignerIdDocuments(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocuments($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Returns a list of Documents uploaded by a given Signer.
     * Only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response|ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdSignersSignerIdDocuments(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Downloads a Document uploaded by a given Signer.
     * Only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $signerDocumentId   Signer Document Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept             Accept content header application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentId(string $signatureRequestId, string $signerId, string $signerDocumentId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentId($signatureRequestId, $signerId, $signerDocumentId, $accept), $fetch);
    }

    /**
     * Send a One-Time Password (OTP) to a given Signer. Use this endpoint only if you use your own signing flow.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtpBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtpUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtpForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtpNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Sends a reminder to a given signer to complete their Signature Request.
     * Only possible when the Signature Request status is `ongoing` and the Signer status is `notified`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminderBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminderUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminderForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminderNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder(string $signatureRequestId, string $signerId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder($signatureRequestId, $signerId), $fetch);
    }

    /**
     * Sign a Signature Request on behalf of a given Signer.
     *
     * @param string                                                           $signatureRequestId Signature Request Id
     * @param string                                                           $signerId           Signer Id
     * @param Model\SignerSign|Model\SignerSignWithUploadedSignatureImage|null $requestBody
     * @param string                                                           $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException
     */
    public function postSignatureRequestsSignatureRequestIdSignersSignerIdSign(string $signatureRequestId, string $signerId, $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSign($signatureRequestId, $signerId, $requestBody), $fetch);
    }

    /**
     * Returns the list of all Templates within your Organization.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetTemplates200Response|ResponseInterface|null
     *
     * @throws Exception\GetTemplatesBadRequestException
     * @throws Exception\GetTemplatesUnauthorizedException
     * @throws Exception\GetTemplatesForbiddenException
     */
    public function getTemplates(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetTemplates($queryParameters), $fetch);
    }

    /**
     * Returns the list of all the Users within your organization.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetUsers200Response|ResponseInterface|null
     *
     * @throws Exception\GetUsersBadRequestException
     * @throws Exception\GetUsersUnauthorizedException
     */
    public function getUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetUsers($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription[]|ResponseInterface|null
     *
     * @throws Exception\GetWebhooksBadRequestException
     * @throws Exception\GetWebhooksUnauthorizedException
     * @throws Exception\GetWebhooksForbiddenException
     */
    public function getWebhooks(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWebhooks(), $fetch);
    }

    /**
     * Creates a new Webhook subscription in your organization.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     *
     * @throws Exception\PostWebhooksSubscriptionsBadRequestException
     * @throws Exception\PostWebhooksSubscriptionsUnauthorizedException
     * @throws Exception\PostWebhooksSubscriptionsForbiddenException
     * @throws Exception\PostWebhooksSubscriptionsNotFoundException
     * @throws Exception\PostWebhooksSubscriptionsUnsupportedMediaTypeException
     */
    public function postWebhooksSubscriptions(?CreateWebhookSubscription $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostWebhooksSubscriptions($requestBody), $fetch);
    }

    /**
     * Deletes a given Webhook subscription.
     *
     * @param string $webhookId Webhook Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteWebhooksWebhookIdBadRequestException
     * @throws Exception\DeleteWebhooksWebhookIdUnauthorizedException
     * @throws Exception\DeleteWebhooksWebhookIdForbiddenException
     * @throws Exception\DeleteWebhooksWebhookIdNotFoundException
     */
    public function deleteWebhooksWebhookId(string $webhookId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteWebhooksWebhookId($webhookId), $fetch);
    }

    /**
     * Retrieves a given Webhook subscription.
     *
     * @param string $webhookId Webhook Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     *
     * @throws Exception\GetWebhooksWebhookIdBadRequestException
     * @throws Exception\GetWebhooksWebhookIdUnauthorizedException
     * @throws Exception\GetWebhooksWebhookIdForbiddenException
     * @throws Exception\GetWebhooksWebhookIdNotFoundException
     * @throws Exception\GetWebhooksWebhookIdUnsupportedMediaTypeException
     */
    public function getWebhooksWebhookId(string $webhookId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWebhooksWebhookId($webhookId), $fetch);
    }

    /**
     * Updates a given Webhook subscription.
     * Any parameters not provided are left unchanged.
     *
     * @param string $webhookId Webhook Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     *
     * @throws Exception\PatchWebhooksWebhookIdBadRequestException
     * @throws Exception\PatchWebhooksWebhookIdUnauthorizedException
     * @throws Exception\PatchWebhooksWebhookIdForbiddenException
     * @throws Exception\PatchWebhooksWebhookIdNotFoundException
     */
    public function patchWebhooksWebhookId(string $webhookId, ?UpdateWebhookSubscription $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchWebhooksWebhookId($webhookId, $requestBody), $fetch);
    }

    /**
     * Returns the list of all Workspaces within your Organization.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit The limit of items count to retrieve.
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\GetWorkspaces200Response|ResponseInterface|null
     *
     * @throws Exception\GetWorkspacesBadRequestException
     * @throws Exception\GetWorkspacesUnauthorizedException
     * @throws Exception\GetWorkspacesForbiddenException
     */
    public function getWorkspaces(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWorkspaces($queryParameters), $fetch);
    }

    /**
     * Creates a new Workspace in the organization.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Workspace|ResponseInterface|null
     *
     * @throws Exception\PostWorkspaceBadRequestException
     * @throws Exception\PostWorkspaceUnauthorizedException
     * @throws Exception\PostWorkspaceForbiddenException
     * @throws Exception\PostWorkspaceNotFoundException
     * @throws Exception\PostWorkspaceUnsupportedMediaTypeException
     */
    public function postWorkspace(?CreateWorkspace $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostWorkspace($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Workspace|ResponseInterface|null
     *
     * @throws Exception\GetWorkspacesDefaultBadRequestException
     * @throws Exception\GetWorkspacesDefaultUnauthorizedException
     * @throws Exception\GetWorkspacesDefaultForbiddenException
     * @throws Exception\GetWorkspacesDefaultNotFoundException
     */
    public function getWorkspacesDefault(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWorkspacesDefault(), $fetch);
    }

    /**
     * Marks the given Workspace as default.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\MarkWorkspaceAsDefaultBadRequestException
     * @throws Exception\MarkWorkspaceAsDefaultUnauthorizedException
     * @throws Exception\MarkWorkspaceAsDefaultForbiddenException
     * @throws Exception\MarkWorkspaceAsDefaultUnsupportedMediaTypeException
     */
    public function markWorkspaceAsDefault(?MarkWorkspaceAsDefault $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\MarkWorkspaceAsDefault($requestBody), $fetch);
    }

    /**
     * Deletes a given Workspace and transfers everything that is attached to this Workspace to a another specified Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteWorkspaceBadRequestException
     * @throws Exception\DeleteWorkspaceUnauthorizedException
     * @throws Exception\DeleteWorkspaceForbiddenException
     * @throws Exception\DeleteWorkspaceNotFoundException
     * @throws Exception\DeleteWorkspaceUnsupportedMediaTypeException
     */
    public function deleteWorkspace(string $workspaceId, ?DeleteWorkspace $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\DeleteWorkspace($workspaceId, $requestBody), $fetch);
    }

    /**
     * Retrieves a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Workspace|ResponseInterface|null
     *
     * @throws Exception\GetWorkspacesWorkspaceIdBadRequestException
     * @throws Exception\GetWorkspacesWorkspaceIdUnauthorizedException
     * @throws Exception\GetWorkspacesWorkspaceIdForbiddenException
     * @throws Exception\GetWorkspacesWorkspaceIdNotFoundException
     */
    public function getWorkspacesWorkspaceId(string $workspaceId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWorkspacesWorkspaceId($workspaceId), $fetch);
    }

    /**
     * Updates a given Workspace.
     * Any parameters not provided are left unchanged.
     *
     * @param string $workspaceId Workspace Id
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Workspace|ResponseInterface|null
     *
     * @throws Exception\PatchWorkspacesWorkspaceIdBadRequestException
     * @throws Exception\PatchWorkspacesWorkspaceIdUnauthorizedException
     * @throws Exception\PatchWorkspacesWorkspaceIdForbiddenException
     * @throws Exception\PatchWorkspacesWorkspaceIdNotFoundException
     * @throws Exception\PatchWorkspacesWorkspaceIdUnsupportedMediaTypeException
     */
    public function patchWorkspacesWorkspaceId(string $workspaceId, ?UpdateWorkspace $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchWorkspacesWorkspaceId($workspaceId, $requestBody), $fetch);
    }

    /**
     * Removes a User from a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $userId      User Id
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\DeleteWorkspaceWorkspaceIdUsersUserIdBadRequestException
     * @throws Exception\DeleteWorkspaceWorkspaceIdUsersUserIdUnauthorizedException
     * @throws Exception\DeleteWorkspaceWorkspaceIdUsersUserIdForbiddenException
     * @throws Exception\DeleteWorkspaceWorkspaceIdUsersUserIdNotFoundException
     */
    public function deleteWorkspaceWorkspaceIdUsersUserId(string $workspaceId, string $userId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DeleteWorkspaceWorkspaceIdUsersUserId($workspaceId, $userId), $fetch);
    }

    /**
     * Associates a User with a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $userId      User Id
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PutWorkspacesWorkspaceIdUsersBadRequestException
     * @throws Exception\PutWorkspacesWorkspaceIdUsersUnauthorizedException
     * @throws Exception\PutWorkspacesWorkspaceIdUsersForbiddenException
     * @throws Exception\PutWorkspacesWorkspaceIdUsersNotFoundException
     */
    public function putWorkspacesWorkspaceIdUsers(string $workspaceId, string $userId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PutWorkspacesWorkspaceIdUsers($workspaceId, $userId), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = []): static
    {
        if (null === $httpClient) {
            $httpClient = Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = Psr17FactoryDiscovery::findUriFactory()->createUri('https://api-sandbox.yousign.app/v3');
            $plugins[] = new AddHostPlugin($uri);
            $plugins[] = new AddPathPlugin($uri);
            if ([] !== $additionalPlugins) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new PluginClient($httpClient, $plugins);
        }
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new ArrayDenormalizer(), new JaneObjectNormalizer()];
        if ([] !== $additionalNormalizers) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new Serializer($normalizers, [new JsonEncoder(new JsonEncode(), new JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
