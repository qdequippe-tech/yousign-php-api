<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\LegalPerson;
use Qdequippe\Yousign\Api\Model\LegalPersonApplicant;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class LegalPersonApplicantNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return LegalPersonApplicant::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && LegalPersonApplicant::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new LegalPersonApplicant();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
        }
        if (\array_key_exists('workflow_session_id', $data) && null !== $data['workflow_session_id']) {
            $object->setWorkflowSessionId($data['workflow_session_id']);
        } elseif (\array_key_exists('workflow_session_id', $data) && null === $data['workflow_session_id']) {
            $object->setWorkflowSessionId(null);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('label', $data) && null !== $data['label']) {
            $object->setLabel($data['label']);
        } elseif (\array_key_exists('label', $data) && null === $data['label']) {
            $object->setLabel(null);
        }
        if (\array_key_exists('reference_id', $data) && null !== $data['reference_id']) {
            $object->setReferenceId($data['reference_id']);
        } elseif (\array_key_exists('reference_id', $data) && null === $data['reference_id']) {
            $object->setReferenceId(null);
        }
        if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
            $object->setDeliveryMode($data['delivery_mode']);
        } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
            $object->setDeliveryMode(null);
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($data['email']);
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && null !== $data['updated_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['updated_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setUpdatedAt($date_1);
        } elseif (\array_key_exists('updated_at', $data) && null === $data['updated_at']) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('legal_person', $data) && null !== $data['legal_person']) {
            $object->setLegalPerson($this->denormalizer->denormalize($data['legal_person'], LegalPerson::class, 'json', $context));
        } elseif (\array_key_exists('legal_person', $data) && null === $data['legal_person']) {
            $object->setLegalPerson(null);
        }
        if (\array_key_exists('parent_applicant_id', $data) && null !== $data['parent_applicant_id']) {
            $object->setParentApplicantId($data['parent_applicant_id']);
        } elseif (\array_key_exists('parent_applicant_id', $data) && null === $data['parent_applicant_id']) {
            $object->setParentApplicantId(null);
        }
        if (\array_key_exists('child_applicant_ids', $data) && null !== $data['child_applicant_ids']) {
            $values = [];
            foreach ($data['child_applicant_ids'] as $value) {
                $values[] = $value;
            }
            $object->setChildApplicantIds($values);
        } elseif (\array_key_exists('child_applicant_ids', $data) && null === $data['child_applicant_ids']) {
            $object->setChildApplicantIds(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['label'] = $data->getLabel();
        $dataArray['reference_id'] = $data->getReferenceId();
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['email'] = $data->getEmail();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['type'] = $data->getType();
        $dataArray['legal_person'] = null === $data->getLegalPerson() ? null : new JsonObject($this->normalizer->normalize($data->getLegalPerson(), 'json', $context));
        $dataArray['parent_applicant_id'] = $data->getParentApplicantId();
        $values = [];
        foreach ($data->getChildApplicantIds() as $value) {
            $values[] = $value;
        }
        $dataArray['child_applicant_ids'] = $values;

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [LegalPersonApplicant::class => false];
    }
}
