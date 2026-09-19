<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataBeneficialOwners;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CompanyFullAllOfDataBeneficialOwnersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CompanyFullAllOfDataBeneficialOwners::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CompanyFullAllOfDataBeneficialOwners::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CompanyFullAllOfDataBeneficialOwners();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('percentage_of_shares', $data) && \is_int($data['percentage_of_shares'])) {
            $data['percentage_of_shares'] = (float) $data['percentage_of_shares'];
        }
        if (\array_key_exists('voting_percentage', $data) && \is_int($data['voting_percentage'])) {
            $data['voting_percentage'] = (float) $data['voting_percentage'];
        }
        if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
            $object->setFirstName($data['first_name']);
            unset($data['first_name']);
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
            unset($data['first_name']);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
            unset($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
            unset($data['last_name']);
        }
        if (\array_key_exists('gender', $data) && null !== $data['gender']) {
            $object->setGender($data['gender']);
            unset($data['gender']);
        } elseif (\array_key_exists('gender', $data) && null === $data['gender']) {
            $object->setGender(null);
            unset($data['gender']);
        }
        if (\array_key_exists('born_on', $data) && null !== $data['born_on']) {
            $object->setBornOn($data['born_on']);
            unset($data['born_on']);
        } elseif (\array_key_exists('born_on', $data) && null === $data['born_on']) {
            $object->setBornOn(null);
            unset($data['born_on']);
        }
        if (\array_key_exists('percentage_of_shares', $data) && null !== $data['percentage_of_shares']) {
            $object->setPercentageOfShares($data['percentage_of_shares']);
            unset($data['percentage_of_shares']);
        } elseif (\array_key_exists('percentage_of_shares', $data) && null === $data['percentage_of_shares']) {
            $object->setPercentageOfShares(null);
            unset($data['percentage_of_shares']);
        }
        if (\array_key_exists('voting_percentage', $data) && null !== $data['voting_percentage']) {
            $object->setVotingPercentage($data['voting_percentage']);
            unset($data['voting_percentage']);
        } elseif (\array_key_exists('voting_percentage', $data) && null === $data['voting_percentage']) {
            $object->setVotingPercentage(null);
            unset($data['voting_percentage']);
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
        $dataArray['first_name'] = $data->getFirstName();
        $dataArray['last_name'] = $data->getLastName();
        $dataArray['gender'] = $data->getGender();
        $dataArray['born_on'] = $data->getBornOn();
        $dataArray['percentage_of_shares'] = $data->getPercentageOfShares();
        $dataArray['voting_percentage'] = $data->getVotingPercentage();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CompanyFullAllOfDataBeneficialOwners::class => false];
    }
}
