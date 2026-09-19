<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmbeddedPreparationRedirectUrls;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignatureRequestEmbeddedPreparationRedirectUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureRequestEmbeddedPreparationRedirectUrls::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureRequestEmbeddedPreparationRedirectUrls::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureRequestEmbeddedPreparationRedirectUrls();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('done', $data) && null !== $data['done']) {
            $object->setDone($data['done']);
        } elseif (\array_key_exists('done', $data) && null === $data['done']) {
            $object->setDone(null);
        }
        if (\array_key_exists('back', $data) && null !== $data['back']) {
            $object->setBack($data['back']);
        } elseif (\array_key_exists('back', $data) && null === $data['back']) {
            $object->setBack(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('done') && null !== $data->getDone()) {
            $dataArray['done'] = $data->getDone();
        }
        if ($data->isInitialized('back') && null !== $data->getBack()) {
            $dataArray['back'] = $data->getBack();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignatureRequestEmbeddedPreparationRedirectUrls::class => false];
    }
}
