<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceEmbeddedPreparationNavigationBar;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateCustomExperienceEmbeddedPreparationNavigationBarNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateCustomExperienceEmbeddedPreparationNavigationBar::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateCustomExperienceEmbeddedPreparationNavigationBar::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateCustomExperienceEmbeddedPreparationNavigationBar();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('done_button', $data) && \is_int($data['done_button'])) {
            $data['done_button'] = (bool) $data['done_button'];
        }
        if (\array_key_exists('back_button', $data) && \is_int($data['back_button'])) {
            $data['back_button'] = (bool) $data['back_button'];
        }
        if (\array_key_exists('done_button', $data) && null !== $data['done_button']) {
            $object->setDoneButton($data['done_button']);
            unset($data['done_button']);
        } elseif (\array_key_exists('done_button', $data) && null === $data['done_button']) {
            $object->setDoneButton(null);
            unset($data['done_button']);
        }
        if (\array_key_exists('back_button', $data) && null !== $data['back_button']) {
            $object->setBackButton($data['back_button']);
            unset($data['back_button']);
        } elseif (\array_key_exists('back_button', $data) && null === $data['back_button']) {
            $object->setBackButton(null);
            unset($data['back_button']);
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
        if ($data->isInitialized('doneButton') && null !== $data->getDoneButton()) {
            $dataArray['done_button'] = $data->getDoneButton();
        }
        if ($data->isInitialized('backButton') && null !== $data->getBackButton()) {
            $dataArray['back_button'] = $data->getBackButton();
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
        return [CreateCustomExperienceEmbeddedPreparationNavigationBar::class => false];
    }
}
