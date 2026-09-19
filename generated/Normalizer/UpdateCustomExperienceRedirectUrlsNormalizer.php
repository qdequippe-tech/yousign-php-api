<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateCustomExperienceRedirectUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateCustomExperienceRedirectUrls::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateCustomExperienceRedirectUrls::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateCustomExperienceRedirectUrls();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('success', $data) && null !== $data['success']) {
            $object->setSuccess($data['success']);
            unset($data['success']);
        } elseif (\array_key_exists('success', $data) && null === $data['success']) {
            $object->setSuccess(null);
            unset($data['success']);
        }
        if (\array_key_exists('error', $data) && null !== $data['error']) {
            $object->setError($data['error']);
            unset($data['error']);
        } elseif (\array_key_exists('error', $data) && null === $data['error']) {
            $object->setError(null);
            unset($data['error']);
        }
        if (\array_key_exists('decline', $data) && null !== $data['decline']) {
            $object->setDecline($data['decline']);
            unset($data['decline']);
        } elseif (\array_key_exists('decline', $data) && null === $data['decline']) {
            $object->setDecline(null);
            unset($data['decline']);
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
        $dataArray['success'] = $data->getSuccess();
        $dataArray['error'] = $data->getError();
        $dataArray['decline'] = $data->getDecline();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateCustomExperienceRedirectUrls::class => false];
    }
}
