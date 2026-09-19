<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ElectronicSealAuditTrailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ElectronicSealAuditTrail::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ElectronicSealAuditTrail::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ElectronicSealAuditTrail();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('version', $data) && \is_int($data['version'])) {
            $data['version'] = (float) $data['version'];
        }
        if (\array_key_exists('version', $data) && null !== $data['version']) {
            $object->setVersion($data['version']);
            unset($data['version']);
        } elseif (\array_key_exists('version', $data) && null === $data['version']) {
            $object->setVersion(null);
            unset($data['version']);
        }
        if (\array_key_exists('classification', $data) && null !== $data['classification']) {
            $object->setClassification($data['classification']);
            unset($data['classification']);
        } elseif (\array_key_exists('classification', $data) && null === $data['classification']) {
            $object->setClassification(null);
            unset($data['classification']);
        }
        if (\array_key_exists('organization', $data) && null !== $data['organization']) {
            $values = new JsonObject();
            foreach ($data['organization'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setOrganization($values);
            unset($data['organization']);
        } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
            $object->setOrganization(null);
            unset($data['organization']);
        }
        if (\array_key_exists('seal', $data) && null !== $data['seal']) {
            $values_1 = new JsonObject();
            foreach ($data['seal'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setSeal($values_1);
            unset($data['seal']);
        } elseif (\array_key_exists('seal', $data) && null === $data['seal']) {
            $object->setSeal(null);
            unset($data['seal']);
        }
        if (\array_key_exists('document', $data) && null !== $data['document']) {
            $values_2 = new JsonObject();
            foreach ($data['document'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setDocument($values_2);
            unset($data['document']);
        } elseif (\array_key_exists('document', $data) && null === $data['document']) {
            $object->setDocument(null);
            unset($data['document']);
        }
        foreach ($data as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $object[$key_3] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['version'] = $data->getVersion();
        $dataArray['classification'] = $data->getClassification();
        $values = new JsonObject();
        foreach ($data->getOrganization() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['organization'] = $values;
        $values_1 = new JsonObject();
        foreach ($data->getSeal() as $key_1 => $value_1) {
            $values_1[$key_1] = $value_1;
        }
        $dataArray['seal'] = $values_1;
        $values_2 = new JsonObject();
        foreach ($data->getDocument() as $key_2 => $value_2) {
            $values_2[$key_2] = $value_2;
        }
        $dataArray['document'] = $values_2;
        foreach ($data->additionalPropertyEntries() as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $dataArray[$key_3] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ElectronicSealAuditTrail::class => false];
    }
}
