<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InvitedSignersConsumption;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InvitedSignersConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InvitedSignersConsumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InvitedSignersConsumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InvitedSignersConsumption();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $object->setCreatedAt($data['created_at']);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
            $object->setSignerId($data['signer_id']);
            unset($data['signer_id']);
        } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
            $object->setSignerId(null);
            unset($data['signer_id']);
        }
        if (\array_key_exists('signer_email', $data) && null !== $data['signer_email']) {
            $object->setSignerEmail($data['signer_email']);
            unset($data['signer_email']);
        } elseif (\array_key_exists('signer_email', $data) && null === $data['signer_email']) {
            $object->setSignerEmail(null);
            unset($data['signer_email']);
        }
        if (\array_key_exists('signature_request_id', $data) && null !== $data['signature_request_id']) {
            $object->setSignatureRequestId($data['signature_request_id']);
            unset($data['signature_request_id']);
        } elseif (\array_key_exists('signature_request_id', $data) && null === $data['signature_request_id']) {
            $object->setSignatureRequestId(null);
            unset($data['signature_request_id']);
        }
        if (\array_key_exists('signature_request_name', $data) && null !== $data['signature_request_name']) {
            $object->setSignatureRequestName($data['signature_request_name']);
            unset($data['signature_request_name']);
        } elseif (\array_key_exists('signature_request_name', $data) && null === $data['signature_request_name']) {
            $object->setSignatureRequestName(null);
            unset($data['signature_request_name']);
        }
        if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
            $object->setSignatureLevel($data['signature_level']);
            unset($data['signature_level']);
        } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
            $object->setSignatureLevel(null);
            unset($data['signature_level']);
        }
        if (\array_key_exists('sender_id', $data) && null !== $data['sender_id']) {
            $object->setSenderId($data['sender_id']);
            unset($data['sender_id']);
        } elseif (\array_key_exists('sender_id', $data) && null === $data['sender_id']) {
            $object->setSenderId(null);
            unset($data['sender_id']);
        }
        if (\array_key_exists('sender_email', $data) && null !== $data['sender_email']) {
            $object->setSenderEmail($data['sender_email']);
            unset($data['sender_email']);
        } elseif (\array_key_exists('sender_email', $data) && null === $data['sender_email']) {
            $object->setSenderEmail(null);
            unset($data['sender_email']);
        }
        if (\array_key_exists('source', $data) && null !== $data['source']) {
            $object->setSource($data['source']);
            unset($data['source']);
        } elseif (\array_key_exists('source', $data) && null === $data['source']) {
            $object->setSource(null);
            unset($data['source']);
        }
        if (\array_key_exists('connector', $data) && null !== $data['connector']) {
            $object->setConnector($data['connector']);
            unset($data['connector']);
        } elseif (\array_key_exists('connector', $data) && null === $data['connector']) {
            $object->setConnector(null);
            unset($data['connector']);
        }
        if (\array_key_exists('authentication_key', $data) && null !== $data['authentication_key']) {
            $object->setAuthenticationKey($data['authentication_key']);
            unset($data['authentication_key']);
        } elseif (\array_key_exists('authentication_key', $data) && null === $data['authentication_key']) {
            $object->setAuthenticationKey(null);
            unset($data['authentication_key']);
        }
        if (\array_key_exists('authentication_key_description', $data) && null !== $data['authentication_key_description']) {
            $object->setAuthenticationKeyDescription($data['authentication_key_description']);
            unset($data['authentication_key_description']);
        } elseif (\array_key_exists('authentication_key_description', $data) && null === $data['authentication_key_description']) {
            $object->setAuthenticationKeyDescription(null);
            unset($data['authentication_key_description']);
        }
        if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
            $object->setExternalId($data['external_id']);
            unset($data['external_id']);
        } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
            $object->setExternalId(null);
            unset($data['external_id']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('workspace_name', $data) && null !== $data['workspace_name']) {
            $object->setWorkspaceName($data['workspace_name']);
            unset($data['workspace_name']);
        } elseif (\array_key_exists('workspace_name', $data) && null === $data['workspace_name']) {
            $object->setWorkspaceName(null);
            unset($data['workspace_name']);
        }
        if (\array_key_exists('signer_fullname', $data) && null !== $data['signer_fullname']) {
            $object->setSignerFullname($data['signer_fullname']);
            unset($data['signer_fullname']);
        } elseif (\array_key_exists('signer_fullname', $data) && null === $data['signer_fullname']) {
            $object->setSignerFullname(null);
            unset($data['signer_fullname']);
        }
        if (\array_key_exists('workspace_external_name', $data) && null !== $data['workspace_external_name']) {
            $object->setWorkspaceExternalName($data['workspace_external_name']);
            unset($data['workspace_external_name']);
        } elseif (\array_key_exists('workspace_external_name', $data) && null === $data['workspace_external_name']) {
            $object->setWorkspaceExternalName(null);
            unset($data['workspace_external_name']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['created_at'] = $data->getCreatedAt();
        $dataArray['signer_id'] = $data->getSignerId();
        $dataArray['signer_email'] = $data->getSignerEmail();
        $dataArray['signature_request_id'] = $data->getSignatureRequestId();
        $dataArray['signature_request_name'] = $data->getSignatureRequestName();
        $dataArray['signature_level'] = $data->getSignatureLevel();
        $dataArray['sender_id'] = $data->getSenderId();
        $dataArray['sender_email'] = $data->getSenderEmail();
        $dataArray['source'] = $data->getSource();
        $dataArray['connector'] = $data->getConnector();
        $dataArray['authentication_key'] = $data->getAuthenticationKey();
        $dataArray['authentication_key_description'] = $data->getAuthenticationKeyDescription();
        $dataArray['external_id'] = $data->getExternalId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['workspace_name'] = $data->getWorkspaceName();
        $dataArray['signer_fullname'] = $data->getSignerFullname();
        $dataArray['workspace_external_name'] = $data->getWorkspaceExternalName();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InvitedSignersConsumption::class => false];
    }
}
