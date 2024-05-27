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
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\DeleteWebhooksWebhookId;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealDocument;
use Qdequippe\Yousign\Api\Endpoint\DownloadElectronicSealImage;
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
use Qdequippe\Yousign\Api\Endpoint\ListElectronicSealImages;
use Qdequippe\Yousign\Api\Endpoint\PatchContactsContactId;
use Qdequippe\Yousign\Api\Endpoint\PatchCustomExperienceLogo;
use Qdequippe\Yousign\Api\Endpoint\PatchCustomExperiencesCustomExperienceId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdApproversApproverId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Qdequippe\Yousign\Api\Endpoint\PatchSignatureRequestsSignatureRequestIdSignersSignerId;
use Qdequippe\Yousign\Api\Endpoint\PatchWebhooksWebhookId;
use Qdequippe\Yousign\Api\Endpoint\PostContact;
use Qdequippe\Yousign\Api\Endpoint\PostCustomExperience;
use Qdequippe\Yousign\Api\Endpoint\PostDocuments;
use Qdequippe\Yousign\Api\Endpoint\PostElectronicSeals;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequests;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdApprovers;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdCancel;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentRequests;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocuments;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdFollowers;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdReactivate;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignatures;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSigners;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder;
use Qdequippe\Yousign\Api\Endpoint\PostSignatureRequestsSignatureRequestIdSignersSignerIdSign;
use Qdequippe\Yousign\Api\Endpoint\PostWebhooksSubscriptions;
use Qdequippe\Yousign\Api\Endpoint\PutSignatureRequestsSignatureRequestIdMetadata;
use Qdequippe\Yousign\Api\Endpoint\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Model\CreateCustomExperience;
use Qdequippe\Yousign\Api\Model\CreateDocument;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\CreateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\Follower;
use Qdequippe\Yousign\Api\Model\PatchCustomExperienceLogoRequest;
use Qdequippe\Yousign\Api\Model\PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancelRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdReactivateRequest;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsBadRequestException
     * @throws Exception\PostSignatureRequestsUnauthorizedException
     * @throws Exception\PostSignatureRequestsForbiddenException
     * @throws Exception\PostSignatureRequestsNotFoundException
     */
    public function postSignatureRequests(?CreateSignatureRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequests($requestBody), $fetch);
    }

    /**
     * Delete a Signature Request (except in approval and ongoing status).
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdBadRequestException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdUnauthorizedException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdForbiddenException
     * @throws Exception\PatchSignatureRequestsSignatureRequestIdNotFoundException
     */
    public function patchSignatureRequestsSignatureRequestId(string $signatureRequestId, ?UpdateSignatureRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestId($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequestActivated|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignaturesBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignaturesUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignaturesForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignaturesNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdSignatures(string $signatureRequestId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSignatures($signatureRequestId), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdCancelNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdCancel(string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdCancelRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdCancel($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignatureRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdReactivateNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdReactivate(string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdReactivateRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdReactivate($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept             Accept content header application/zip, application/pdf|application/json
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadBadRequestException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadUnauthorizedException
     * @throws Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadNotFoundException
     */
    public function getSignatureRequestsSignatureRequestIdAuditTrailsDownload(string $signatureRequestId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new GetSignatureRequestsSignatureRequestIdAuditTrailsDownload($signatureRequestId, $accept), $fetch);
    }

    /**
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentsNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdDocuments(string $signatureRequestId, ?CreateDocument $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $requestBody), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var string $version specify Documents version to download, "completed" is only available when the Signature Request status is "done"
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
     */
    public function patchSignatureRequestsSignatureRequestIdDocumentsDocumentId(string $signatureRequestId, string $documentId, ?UpdateDocument $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
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
     */
    public function postSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace(string $signatureRequestId, string $documentId, ?PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document ID
     * @param array  $queryParameters    {
     *
     * @var array  $types[] Filter by Field type
     * @var string $after After cursor (pagination)
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
     */
    public function postSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields(string $signatureRequestId, string $documentId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields($signatureRequestId, $documentId, $requestBody), $fetch);
    }

    /**
     * Delete a Document's Field in a Signature Request (in draft status).
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
     * Update a Document's Field in a Signature Request (in draft status).
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
     */
    public function updateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId(string $signatureRequestId, string $documentId, string $fieldId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId($signatureRequestId, $documentId, $fieldId, $requestBody), $fetch);
    }

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\SignerDocumentRequest|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdDocumentRequestsNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdDocumentRequests(string $signatureRequestId, ?CreateSignerDocumentRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdDocumentRequests($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Signer|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdSigners(string $signatureRequestId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSigners($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     */
    public function patchSignatureRequestsSignatureRequestIdSignersSignerId(string $signatureRequestId, string $signerId, ?UpdateSigner $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdSignersSignerId($signatureRequestId, $signerId, $requestBody), $fetch);
    }

    /**
     * Send a one-time password (OTP) to a specified Signer. This endpoint is useful for integrating the signing flow into your application and allowing the Signer to sign through the API. Once the OTP is sent, the Signer must provide it back to complete the Signature Request.
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdSignersSignerIdSign(string $signatureRequestId, string $signerId, ?SignerSign $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSign($signatureRequestId, $signerId, $requestBody), $fetch);
    }

    /**
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
     * Create a new Approver either from: - scratch - an existing Contact - an existing User - an existing Signer.
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
     */
    public function postSignatureRequestsSignatureRequestIdApprovers(string $signatureRequestId, ?\stdClass $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdApprovers($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     */
    public function patchSignatureRequestsSignatureRequestIdApproversApproverId(string $signatureRequestId, string $approverId, ?PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId, $requestBody), $fetch);
    }

    /**
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
     */
    public function postSignatureRequestsSignatureRequestIdFollowers(string $signatureRequestId, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdFollowers($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     * @param string $signatureRequestId Signature Request Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\Metadata|ResponseInterface|null
     *
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataBadRequestException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws Exception\PostSignatureRequestsSignatureRequestIdMetadataNotFoundException
     */
    public function postSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId, ?CreateSignatureRequestMetadata $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostSignatureRequestsSignatureRequestIdMetadata($signatureRequestId, $requestBody), $fetch);
    }

    /**
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
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PostCustomExperienceBadRequestException
     * @throws Exception\PostCustomExperienceUnauthorizedException
     * @throws Exception\PostCustomExperienceForbiddenException
     */
    public function postCustomExperience(?CreateCustomExperience $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostCustomExperience($requestBody), $fetch);
    }

    /**
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
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdBadRequestException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdUnauthorizedException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdForbiddenException
     * @throws Exception\PatchCustomExperiencesCustomExperienceIdNotFoundException
     */
    public function patchCustomExperiencesCustomExperienceId(string $customExperienceId, ?UpdateCustomExperience $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchCustomExperiencesCustomExperienceId($customExperienceId, $requestBody), $fetch);
    }

    /**
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
     * @param string $customExperienceId Custom Experience Id
     * @param string $fetch              Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\CustomExperience|ResponseInterface|null
     *
     * @throws Exception\PatchCustomExperienceLogoBadRequestException
     * @throws Exception\PatchCustomExperienceLogoUnauthorizedException
     * @throws Exception\PatchCustomExperienceLogoForbiddenException
     */
    public function patchCustomExperienceLogo(string $customExperienceId, ?PatchCustomExperienceLogoRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchCustomExperienceLogo($customExperienceId, $requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSeal|ResponseInterface|null
     *
     * @throws Exception\PostElectronicSealsBadRequestException
     * @throws Exception\PostElectronicSealsUnauthorizedException
     * @throws Exception\PostElectronicSealsForbiddenException
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
     * Upload an Electronic Seal Document to use for creating an Electronic Seal (can be used for only one Electronic Seal).
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Model\ElectronicSealDocument|ResponseInterface|null
     *
     * @throws Exception\UploadElectronicSealDocumentBadRequestException
     * @throws Exception\UploadElectronicSealDocumentUnauthorizedException
     * @throws Exception\UploadElectronicSealDocumentForbiddenException
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
     */
    public function uploadElectronicSealImage(?UploadElectronicSealImage $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\UploadElectronicSealImage($requestBody), $fetch);
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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     *
     * @throws Exception\PostWebhooksSubscriptionsBadRequestException
     * @throws Exception\PostWebhooksSubscriptionsUnauthorizedException
     * @throws Exception\PostWebhooksSubscriptionsForbiddenException
     * @throws Exception\PostWebhooksSubscriptionsNotFoundException
     */
    public function postWebhooksSubscriptions(?CreateWebhookSubscription $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostWebhooksSubscriptions($requestBody), $fetch);
    }

    /**
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
     * @param string $webhookId Webhook Id
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     *
     * @throws Exception\GetWebhooksWebhookIdBadRequestException
     * @throws Exception\GetWebhooksWebhookIdUnauthorizedException
     * @throws Exception\GetWebhooksWebhookIdForbiddenException
     * @throws Exception\GetWebhooksWebhookIdNotFoundException
     */
    public function getWebhooksWebhookId(string $webhookId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetWebhooksWebhookId($webhookId), $fetch);
    }

    /**
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
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
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
     * Update the information of a given Contact.
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
     */
    public function patchContactsContactId(string $contactId, ?UpdateContact $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PatchContactsContactId($contactId, $requestBody), $fetch);
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
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
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
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
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
     * @return Document|ResponseInterface|null
     *
     * @throws Exception\PostDocumentsBadRequestException
     * @throws Exception\PostDocumentsUnauthorizedException
     * @throws Exception\PostDocumentsForbiddenException
     */
    public function postDocuments(?CreateDocument $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PostDocuments($requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
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
