<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\ApproverInfo;
use Qdequippe\Yousign\Api\Model\CustomText;
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

class ApproverNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Approver::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Approver::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Approver();
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
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
        }
        if (\array_key_exists('info', $data) && null !== $data['info']) {
            $object->setInfo($this->denormalizer->denormalize($data['info'], ApproverInfo::class, 'json', $context));
            unset($data['info']);
        } elseif (\array_key_exists('info', $data) && null === $data['info']) {
            $object->setInfo(null);
            unset($data['info']);
        }
        if (\array_key_exists('approval_link', $data) && null !== $data['approval_link']) {
            $object->setApprovalLink($data['approval_link']);
            unset($data['approval_link']);
        } elseif (\array_key_exists('approval_link', $data) && null === $data['approval_link']) {
            $object->setApprovalLink(null);
            unset($data['approval_link']);
        }
        if (\array_key_exists('approval_link_expiration_date', $data) && null !== $data['approval_link_expiration_date']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['approval_link_expiration_date']);
            if (false === $date) {
                throw new InvalidDateException($data['approval_link_expiration_date'], 'Y-m-d\TH:i:sP');
            }
            $object->setApprovalLinkExpirationDate($date);
            unset($data['approval_link_expiration_date']);
        } elseif (\array_key_exists('approval_link_expiration_date', $data) && null === $data['approval_link_expiration_date']) {
            $object->setApprovalLinkExpirationDate(null);
            unset($data['approval_link_expiration_date']);
        }
        if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
            $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], CustomText::class, 'json', $context));
            unset($data['custom_text']);
        } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
            $object->setCustomText(null);
            unset($data['custom_text']);
        }
        if (\array_key_exists('approved_at', $data) && null !== $data['approved_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['approved_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['approved_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setApprovedAt($date_1);
            unset($data['approved_at']);
        } elseif (\array_key_exists('approved_at', $data) && null === $data['approved_at']) {
            $object->setApprovedAt(null);
            unset($data['approved_at']);
        }
        if (\array_key_exists('recipient_stage_index', $data) && null !== $data['recipient_stage_index']) {
            $object->setRecipientStageIndex($data['recipient_stage_index']);
            unset($data['recipient_stage_index']);
        } elseif (\array_key_exists('recipient_stage_index', $data) && null === $data['recipient_stage_index']) {
            $object->setRecipientStageIndex(null);
            unset($data['recipient_stage_index']);
        }
        if (\array_key_exists('excluded_documents', $data) && null !== $data['excluded_documents']) {
            $values = [];
            foreach ($data['excluded_documents'] as $value) {
                $values[] = $value;
            }
            $object->setExcludedDocuments($values);
            unset($data['excluded_documents']);
        } elseif (\array_key_exists('excluded_documents', $data) && null === $data['excluded_documents']) {
            $object->setExcludedDocuments(null);
            unset($data['excluded_documents']);
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
        $dataArray['id'] = $data->getId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['info'] = null === $data->getInfo() ? null : new JsonObject($this->normalizer->normalize($data->getInfo(), 'json', $context));
        $dataArray['approval_link'] = $data->getApprovalLink();
        $dataArray['approval_link_expiration_date'] = $data->getApprovalLinkExpirationDate()?->format('Y-m-d\TH:i:sP');
        $dataArray['custom_text'] = null === $data->getCustomText() ? null : new JsonObject($this->normalizer->normalize($data->getCustomText(), 'json', $context));
        $dataArray['approved_at'] = $data->getApprovedAt()?->format('Y-m-d\TH:i:sP');
        $dataArray['recipient_stage_index'] = $data->getRecipientStageIndex();
        $values = [];
        foreach ($data->getExcludedDocuments() as $value) {
            $values[] = $value;
        }
        $dataArray['excluded_documents'] = $values;
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [Approver::class => false];
    }
}
