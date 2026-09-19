<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchRedirectUrls;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSignerFromScratchRedirectUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NewSignerFromScratchRedirectUrls::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NewSignerFromScratchRedirectUrls::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NewSignerFromScratchRedirectUrls();
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
        if ($data->isInitialized('success') && null !== $data->getSuccess()) {
            $dataArray['success'] = $data->getSuccess();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['error'] = $data->getError();
        }
        if ($data->isInitialized('decline') && null !== $data->getDecline()) {
            $dataArray['decline'] = $data->getDecline();
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
        return [NewSignerFromScratchRedirectUrls::class => false];
    }
}
