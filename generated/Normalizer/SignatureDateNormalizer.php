<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateSignatureDateFieldFont;
use Qdequippe\Yousign\Api\Model\SignatureDate;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignatureDateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureDate::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureDate::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureDate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('show_timezone', $data) && \is_int($data['show_timezone'])) {
            $data['show_timezone'] = (bool) $data['show_timezone'];
        }
        if (\array_key_exists('show_email', $data) && \is_int($data['show_email'])) {
            $data['show_email'] = (bool) $data['show_email'];
        }
        if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
            $object->setSignerId($data['signer_id']);
            unset($data['signer_id']);
        } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
            $object->setSignerId(null);
            unset($data['signer_id']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('page', $data) && null !== $data['page']) {
            $object->setPage($data['page']);
            unset($data['page']);
        } elseif (\array_key_exists('page', $data) && null === $data['page']) {
            $object->setPage(null);
            unset($data['page']);
        }
        if (\array_key_exists('x', $data) && null !== $data['x']) {
            $object->setX($data['x']);
            unset($data['x']);
        } elseif (\array_key_exists('x', $data) && null === $data['x']) {
            $object->setX(null);
            unset($data['x']);
        }
        if (\array_key_exists('y', $data) && null !== $data['y']) {
            $object->setY($data['y']);
            unset($data['y']);
        } elseif (\array_key_exists('y', $data) && null === $data['y']) {
            $object->setY(null);
            unset($data['y']);
        }
        if (\array_key_exists('font', $data) && null !== $data['font']) {
            $object->setFont($this->denormalizer->denormalize($data['font'], CreateSignatureDateFieldFont::class, 'json', $context));
            unset($data['font']);
        } elseif (\array_key_exists('font', $data) && null === $data['font']) {
            $object->setFont(null);
            unset($data['font']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('date_format', $data) && null !== $data['date_format']) {
            $object->setDateFormat($data['date_format']);
            unset($data['date_format']);
        } elseif (\array_key_exists('date_format', $data) && null === $data['date_format']) {
            $object->setDateFormat(null);
            unset($data['date_format']);
        }
        if (\array_key_exists('time_format', $data) && null !== $data['time_format']) {
            $object->setTimeFormat($data['time_format']);
            unset($data['time_format']);
        } elseif (\array_key_exists('time_format', $data) && null === $data['time_format']) {
            $object->setTimeFormat(null);
            unset($data['time_format']);
        }
        if (\array_key_exists('show_timezone', $data) && null !== $data['show_timezone']) {
            $object->setShowTimezone($data['show_timezone']);
            unset($data['show_timezone']);
        } elseif (\array_key_exists('show_timezone', $data) && null === $data['show_timezone']) {
            $object->setShowTimezone(null);
            unset($data['show_timezone']);
        }
        if (\array_key_exists('show_email', $data) && null !== $data['show_email']) {
            $object->setShowEmail($data['show_email']);
            unset($data['show_email']);
        } elseif (\array_key_exists('show_email', $data) && null === $data['show_email']) {
            $object->setShowEmail(null);
            unset($data['show_email']);
        }
        if (\array_key_exists('offset_unit', $data) && null !== $data['offset_unit']) {
            $object->setOffsetUnit($data['offset_unit']);
            unset($data['offset_unit']);
        } elseif (\array_key_exists('offset_unit', $data) && null === $data['offset_unit']) {
            $object->setOffsetUnit(null);
            unset($data['offset_unit']);
        }
        if (\array_key_exists('offset_value', $data) && null !== $data['offset_value']) {
            $object->setOffsetValue($data['offset_value']);
            unset($data['offset_value']);
        } elseif (\array_key_exists('offset_value', $data) && null === $data['offset_value']) {
            $object->setOffsetValue(null);
            unset($data['offset_value']);
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
        $dataArray['signer_id'] = $data->getSignerId();
        $dataArray['type'] = $data->getType();
        $dataArray['page'] = $data->getPage();
        $dataArray['x'] = $data->getX();
        $dataArray['y'] = $data->getY();
        if ($data->isInitialized('font') && null !== $data->getFont()) {
            $dataArray['font'] = null === $data->getFont() ? null : new JsonObject($this->normalizer->normalize($data->getFont(), 'json', $context));
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('dateFormat') && null !== $data->getDateFormat()) {
            $dataArray['date_format'] = $data->getDateFormat();
        }
        if ($data->isInitialized('timeFormat') && null !== $data->getTimeFormat()) {
            $dataArray['time_format'] = $data->getTimeFormat();
        }
        if ($data->isInitialized('showTimezone') && null !== $data->getShowTimezone()) {
            $dataArray['show_timezone'] = $data->getShowTimezone();
        }
        if ($data->isInitialized('showEmail') && null !== $data->getShowEmail()) {
            $dataArray['show_email'] = $data->getShowEmail();
        }
        if ($data->isInitialized('offsetUnit') && null !== $data->getOffsetUnit()) {
            $dataArray['offset_unit'] = $data->getOffsetUnit();
        }
        if ($data->isInitialized('offsetValue') && null !== $data->getOffsetValue()) {
            $dataArray['offset_value'] = $data->getOffsetValue();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignatureDate::class => false];
    }
}
