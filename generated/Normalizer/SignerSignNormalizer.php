<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignerSignNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignerSign::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignerSign::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignerSign();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('otp', $data) && null !== $data['otp']) {
            $object->setOtp($data['otp']);
            unset($data['otp']);
        } elseif (\array_key_exists('otp', $data) && null === $data['otp']) {
            $object->setOtp(null);
            unset($data['otp']);
        }
        if (\array_key_exists('ip_address', $data) && null !== $data['ip_address']) {
            $value = $data['ip_address'];
            if (\is_string($data['ip_address'])) {
                $value = $data['ip_address'];
            } elseif (\is_string($data['ip_address'])) {
                $value = $data['ip_address'];
            }
            $object->setIpAddress($value);
            unset($data['ip_address']);
        } elseif (\array_key_exists('ip_address', $data) && null === $data['ip_address']) {
            $object->setIpAddress(null);
            unset($data['ip_address']);
        }
        if (\array_key_exists('consent_given_at', $data) && null !== $data['consent_given_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['consent_given_at']);
            if (false === $date) {
                throw new InvalidDateException($data['consent_given_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setConsentGivenAt($date);
            unset($data['consent_given_at']);
        } elseif (\array_key_exists('consent_given_at', $data) && null === $data['consent_given_at']) {
            $object->setConsentGivenAt(null);
            unset($data['consent_given_at']);
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
        if ($data->isInitialized('otp') && null !== $data->getOtp()) {
            $dataArray['otp'] = $data->getOtp();
        }
        $value = $data->getIpAddress();
        if (\is_string($data->getIpAddress())) {
            $value = $data->getIpAddress();
        } elseif (\is_string($data->getIpAddress())) {
            $value = $data->getIpAddress();
        }
        $dataArray['ip_address'] = $value;
        $dataArray['consent_given_at'] = $data->getConsentGivenAt()->format('Y-m-d\TH:i:sP');
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignerSign::class => false];
    }
}
