<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateLegalPerson;
use Qdequippe\Yousign\Api\Model\CreateWorkflowSessionApplicantLegalPerson;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateWorkflowSessionApplicantLegalPersonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateWorkflowSessionApplicantLegalPerson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateWorkflowSessionApplicantLegalPerson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateWorkflowSessionApplicantLegalPerson();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('legal_person', $data) && null !== $data['legal_person']) {
            $object->setLegalPerson($this->denormalizer->denormalize($data['legal_person'], CreateLegalPerson::class, 'json', $context));
        } elseif (\array_key_exists('legal_person', $data) && null === $data['legal_person']) {
            $object->setLegalPerson(null);
        }
        if (\array_key_exists('parent_applicant_id', $data) && null !== $data['parent_applicant_id']) {
            $object->setParentApplicantId($data['parent_applicant_id']);
        } elseif (\array_key_exists('parent_applicant_id', $data) && null === $data['parent_applicant_id']) {
            $object->setParentApplicantId(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['label'] = $data->getLabel();
        if ($data->isInitialized('referenceId') && null !== $data->getReferenceId()) {
            $dataArray['reference_id'] = $data->getReferenceId();
        }
        if ($data->isInitialized('deliveryMode') && null !== $data->getDeliveryMode()) {
            $dataArray['delivery_mode'] = $data->getDeliveryMode();
        }
        if ($data->isInitialized('email') && null !== $data->getEmail()) {
            $dataArray['email'] = $data->getEmail();
        }
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('legalPerson') && null !== $data->getLegalPerson()) {
            $dataArray['legal_person'] = null === $data->getLegalPerson() ? null : new JsonObject($this->normalizer->normalize($data->getLegalPerson(), 'json', $context));
        }
        if ($data->isInitialized('parentApplicantId') && null !== $data->getParentApplicantId()) {
            $dataArray['parent_applicant_id'] = $data->getParentApplicantId();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateWorkflowSessionApplicantLegalPerson::class => false];
    }
}
