<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateWebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateWebhookSubscription::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateWebhookSubscription::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateWebhookSubscription();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sandbox', $data) && \is_int($data['sandbox'])) {
            $data['sandbox'] = (bool) $data['sandbox'];
        }
        if (\array_key_exists('auto_retry', $data) && \is_int($data['auto_retry'])) {
            $data['auto_retry'] = (bool) $data['auto_retry'];
        }
        if (\array_key_exists('enabled', $data) && \is_int($data['enabled'])) {
            $data['enabled'] = (bool) $data['enabled'];
        }
        if (\array_key_exists('endpoint', $data) && null !== $data['endpoint']) {
            $object->setEndpoint($data['endpoint']);
            unset($data['endpoint']);
        } elseif (\array_key_exists('endpoint', $data) && null === $data['endpoint']) {
            $object->setEndpoint(null);
            unset($data['endpoint']);
        }
        if (\array_key_exists('description', $data) && null !== $data['description']) {
            $object->setDescription($data['description']);
            unset($data['description']);
        } elseif (\array_key_exists('description', $data) && null === $data['description']) {
            $object->setDescription(null);
            unset($data['description']);
        }
        if (\array_key_exists('sandbox', $data) && null !== $data['sandbox']) {
            $object->setSandbox($data['sandbox']);
            unset($data['sandbox']);
        } elseif (\array_key_exists('sandbox', $data) && null === $data['sandbox']) {
            $object->setSandbox(null);
            unset($data['sandbox']);
        }
        if (\array_key_exists('subscribed_events', $data) && null !== $data['subscribed_events']) {
            $value = $data['subscribed_events'];
            if (\is_array($data['subscribed_events']) && $this->isOnlyNumericKeys($data['subscribed_events'])) {
                $values = $data['subscribed_events'];
                $value = $values;
            } elseif (\is_array($data['subscribed_events']) && $this->isOnlyNumericKeys($data['subscribed_events'])) {
                $values_1 = $data['subscribed_events'];
                $value = $values_1;
            }
            $object->setSubscribedEvents($value);
            unset($data['subscribed_events']);
        } elseif (\array_key_exists('subscribed_events', $data) && null === $data['subscribed_events']) {
            $object->setSubscribedEvents(null);
            unset($data['subscribed_events']);
        }
        if (\array_key_exists('secret_key', $data) && null !== $data['secret_key']) {
            $object->setSecretKey($data['secret_key']);
            unset($data['secret_key']);
        } elseif (\array_key_exists('secret_key', $data) && null === $data['secret_key']) {
            $object->setSecretKey(null);
            unset($data['secret_key']);
        }
        if (\array_key_exists('scopes', $data) && null !== $data['scopes']) {
            $value_3 = $data['scopes'];
            if (\is_array($data['scopes']) && $this->isOnlyNumericKeys($data['scopes'])) {
                $values_2 = $data['scopes'];
                $value_3 = $values_2;
            } elseif (\is_array($data['scopes']) && $this->isOnlyNumericKeys($data['scopes'])) {
                $values_3 = $data['scopes'];
                $value_3 = $values_3;
            }
            $object->setScopes($value_3);
            unset($data['scopes']);
        } elseif (\array_key_exists('scopes', $data) && null === $data['scopes']) {
            $object->setScopes(null);
            unset($data['scopes']);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $value_6 = $data['workspaces'];
            if (\is_array($data['workspaces']) && $this->isOnlyNumericKeys($data['workspaces'])) {
                $values_4 = $data['workspaces'];
                $value_6 = $values_4;
            } elseif (\is_array($data['workspaces']) && $this->isOnlyNumericKeys($data['workspaces'])) {
                $values_5 = $data['workspaces'];
                $value_6 = $values_5;
            }
            $object->setWorkspaces($value_6);
            unset($data['workspaces']);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
            unset($data['workspaces']);
        }
        if (\array_key_exists('auto_retry', $data) && null !== $data['auto_retry']) {
            $object->setAutoRetry($data['auto_retry']);
            unset($data['auto_retry']);
        } elseif (\array_key_exists('auto_retry', $data) && null === $data['auto_retry']) {
            $object->setAutoRetry(null);
            unset($data['auto_retry']);
        }
        if (\array_key_exists('enabled', $data) && null !== $data['enabled']) {
            $object->setEnabled($data['enabled']);
            unset($data['enabled']);
        } elseif (\array_key_exists('enabled', $data) && null === $data['enabled']) {
            $object->setEnabled(null);
            unset($data['enabled']);
        }
        foreach ($data as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_9;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['endpoint'] = $data->getEndpoint();
        $dataArray['description'] = $data->getDescription();
        $dataArray['sandbox'] = $data->getSandbox();
        $value = $data->getSubscribedEvents();
        if (\is_array($data->getSubscribedEvents())) {
            $values = $data->getSubscribedEvents();
            $value = $values;
        } elseif (\is_array($data->getSubscribedEvents())) {
            $values_1 = [];
            foreach ($data->getSubscribedEvents() as $value_2) {
                $values_1[] = $value_2;
            }
            $value = $values_1;
        }
        $dataArray['subscribed_events'] = $value;
        if ($data->isInitialized('secretKey') && null !== $data->getSecretKey()) {
            $dataArray['secret_key'] = $data->getSecretKey();
        }
        $value_3 = $data->getScopes();
        if (\is_array($data->getScopes())) {
            $values_2 = $data->getScopes();
            $value_3 = $values_2;
        } elseif (\is_array($data->getScopes())) {
            $values_3 = [];
            foreach ($data->getScopes() as $value_5) {
                $values_3[] = $value_5;
            }
            $value_3 = $values_3;
        }
        $dataArray['scopes'] = $value_3;
        if ($data->isInitialized('workspaces') && null !== $data->getWorkspaces()) {
            $value_6 = $data->getWorkspaces();
            if (\is_array($data->getWorkspaces())) {
                $values_4 = $data->getWorkspaces();
                $value_6 = $values_4;
            } elseif (\is_array($data->getWorkspaces())) {
                $values_5 = [];
                foreach ($data->getWorkspaces() as $value_8) {
                    $values_5[] = $value_8;
                }
                $value_6 = $values_5;
            }
            $dataArray['workspaces'] = $value_6;
        }
        $dataArray['auto_retry'] = $data->getAutoRetry();
        $dataArray['enabled'] = $data->getEnabled();
        foreach ($data->additionalPropertyEntries() as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_9;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateWebhookSubscription::class => false];
    }
}
