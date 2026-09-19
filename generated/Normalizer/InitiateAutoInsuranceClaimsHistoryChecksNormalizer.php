<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitiateAutoInsuranceClaimsHistoryChecks;
use Qdequippe\Yousign\Api\Model\InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateAutoInsuranceClaimsHistoryChecksNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateAutoInsuranceClaimsHistoryChecks::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateAutoInsuranceClaimsHistoryChecks::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateAutoInsuranceClaimsHistoryChecks();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('policy_holder', $data) && null !== $data['policy_holder']) {
            $object->setPolicyHolder($this->denormalizer->denormalize($data['policy_holder'], InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder::class, 'json', $context));
        } elseif (\array_key_exists('policy_holder', $data) && null === $data['policy_holder']) {
            $object->setPolicyHolder(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['policy_holder' => null === $data->getPolicyHolder() ? null : new JsonObject($this->normalizer->normalize($data->getPolicyHolder(), 'json', $context))];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateAutoInsuranceClaimsHistoryChecks::class => false];
    }
}
