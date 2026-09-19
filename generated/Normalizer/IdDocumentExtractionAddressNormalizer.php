<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionAddress;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdDocumentExtractionAddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdDocumentExtractionAddress::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdDocumentExtractionAddress::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdDocumentExtractionAddress();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('handwritten', $data) && \is_int($data['handwritten'])) {
            $data['handwritten'] = (bool) $data['handwritten'];
        }
        if (\array_key_exists('full_address', $data) && null !== $data['full_address']) {
            $object->setFullAddress($data['full_address']);
        } elseif (\array_key_exists('full_address', $data) && null === $data['full_address']) {
            $object->setFullAddress(null);
        }
        if (\array_key_exists('handwritten', $data) && null !== $data['handwritten']) {
            $object->setHandwritten($data['handwritten']);
        } elseif (\array_key_exists('handwritten', $data) && null === $data['handwritten']) {
            $object->setHandwritten(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['full_address' => $data->getFullAddress(), 'handwritten' => $data->getHandwritten()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdDocumentExtractionAddress::class => false];
    }
}
