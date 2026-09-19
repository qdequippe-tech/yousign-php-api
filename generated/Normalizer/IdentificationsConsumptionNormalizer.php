<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdentificationsConsumption;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdentificationsConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdentificationsConsumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdentificationsConsumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdentificationsConsumption();
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
        if (\array_key_exists('signer_identification', $data) && null !== $data['signer_identification']) {
            $object->setSignerIdentification($data['signer_identification']);
            unset($data['signer_identification']);
        } elseif (\array_key_exists('signer_identification', $data) && null === $data['signer_identification']) {
            $object->setSignerIdentification(null);
            unset($data['signer_identification']);
        }
        if (\array_key_exists('identified_at', $data) && null !== $data['identified_at']) {
            $object->setIdentifiedAt($data['identified_at']);
            unset($data['identified_at']);
        } elseif (\array_key_exists('identified_at', $data) && null === $data['identified_at']) {
            $object->setIdentifiedAt(null);
            unset($data['identified_at']);
        }
        if (\array_key_exists('identification_status', $data) && null !== $data['identification_status']) {
            $object->setIdentificationStatus($data['identification_status']);
            unset($data['identification_status']);
        } elseif (\array_key_exists('identification_status', $data) && null === $data['identification_status']) {
            $object->setIdentificationStatus(null);
            unset($data['identification_status']);
        }
        if (\array_key_exists('identification_reasons', $data) && null !== $data['identification_reasons']) {
            $values = [];
            foreach ($data['identification_reasons'] as $value) {
                $values[] = $value;
            }
            $object->setIdentificationReasons($values);
            unset($data['identification_reasons']);
        } elseif (\array_key_exists('identification_reasons', $data) && null === $data['identification_reasons']) {
            $object->setIdentificationReasons(null);
            unset($data['identification_reasons']);
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
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        $dataArray['signer_identification'] = $data->getSignerIdentification();
        $dataArray['identified_at'] = $data->getIdentifiedAt();
        $dataArray['identification_status'] = $data->getIdentificationStatus();
        $values = [];
        foreach ($data->getIdentificationReasons() as $value) {
            $values[] = $value;
        }
        $dataArray['identification_reasons'] = $values;
        $dataArray['sender_id'] = $data->getSenderId();
        $dataArray['sender_email'] = $data->getSenderEmail();
        $dataArray['authentication_key'] = $data->getAuthenticationKey();
        $dataArray['authentication_key_description'] = $data->getAuthenticationKeyDescription();
        $dataArray['external_id'] = $data->getExternalId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['workspace_name'] = $data->getWorkspaceName();
        $dataArray['signer_fullname'] = $data->getSignerFullname();
        $dataArray['workspace_external_name'] = $data->getWorkspaceExternalName();
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdentificationsConsumption::class => false];
    }
}
