<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class UpdateWebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return UpdateWebhookSubscription::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateWebhookSubscription::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateWebhookSubscription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('endpoint', $data) && null !== $data['endpoint']) {
                $object->setEndpoint($data['endpoint']);
                unset($data['endpoint']);
            } elseif (\array_key_exists('endpoint', $data) && null === $data['endpoint']) {
                $object->setEndpoint(null);
            }
            if (\array_key_exists('description', $data) && null !== $data['description']) {
                $object->setDescription($data['description']);
                unset($data['description']);
            } elseif (\array_key_exists('description', $data) && null === $data['description']) {
                $object->setDescription(null);
            }
            if (\array_key_exists('sandbox', $data) && null !== $data['sandbox']) {
                $object->setSandbox($data['sandbox']);
                unset($data['sandbox']);
            } elseif (\array_key_exists('sandbox', $data) && null === $data['sandbox']) {
                $object->setSandbox(null);
            }
            if (\array_key_exists('subscribed_events', $data) && null !== $data['subscribed_events']) {
                $object->setSubscribedEvents($data['subscribed_events']);
                unset($data['subscribed_events']);
            } elseif (\array_key_exists('subscribed_events', $data) && null === $data['subscribed_events']) {
                $object->setSubscribedEvents(null);
            }
            if (\array_key_exists('secret_key', $data) && null !== $data['secret_key']) {
                $object->setSecretKey($data['secret_key']);
                unset($data['secret_key']);
            } elseif (\array_key_exists('secret_key', $data) && null === $data['secret_key']) {
                $object->setSecretKey(null);
            }
            if (\array_key_exists('scopes', $data) && null !== $data['scopes']) {
                $object->setScopes($data['scopes']);
                unset($data['scopes']);
            } elseif (\array_key_exists('scopes', $data) && null === $data['scopes']) {
                $object->setScopes(null);
            }
            if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
                $object->setWorkspaces($data['workspaces']);
                unset($data['workspaces']);
            } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
                $object->setWorkspaces(null);
            }
            if (\array_key_exists('auto_retry', $data) && null !== $data['auto_retry']) {
                $object->setAutoRetry($data['auto_retry']);
                unset($data['auto_retry']);
            } elseif (\array_key_exists('auto_retry', $data) && null === $data['auto_retry']) {
                $object->setAutoRetry(null);
            }
            if (\array_key_exists('enabled', $data) && null !== $data['enabled']) {
                $object->setEnabled($data['enabled']);
                unset($data['enabled']);
            } elseif (\array_key_exists('enabled', $data) && null === $data['enabled']) {
                $object->setEnabled(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('endpoint') && null !== $object->getEndpoint()) {
                $data['endpoint'] = $object->getEndpoint();
            }
            if ($object->isInitialized('description') && null !== $object->getDescription()) {
                $data['description'] = $object->getDescription();
            }
            if ($object->isInitialized('sandbox') && null !== $object->getSandbox()) {
                $data['sandbox'] = $object->getSandbox();
            }
            if ($object->isInitialized('subscribedEvents') && null !== $object->getSubscribedEvents()) {
                $data['subscribed_events'] = $object->getSubscribedEvents();
            }
            if ($object->isInitialized('secretKey') && null !== $object->getSecretKey()) {
                $data['secret_key'] = $object->getSecretKey();
            }
            if ($object->isInitialized('scopes') && null !== $object->getScopes()) {
                $data['scopes'] = $object->getScopes();
            }
            if ($object->isInitialized('workspaces') && null !== $object->getWorkspaces()) {
                $data['workspaces'] = $object->getWorkspaces();
            }
            if ($object->isInitialized('autoRetry') && null !== $object->getAutoRetry()) {
                $data['auto_retry'] = $object->getAutoRetry();
            }
            if ($object->isInitialized('enabled') && null !== $object->getEnabled()) {
                $data['enabled'] = $object->getEnabled();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UpdateWebhookSubscription::class => false];
        }
    }
} else {
    class UpdateWebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UpdateWebhookSubscription::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateWebhookSubscription::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateWebhookSubscription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('endpoint', $data) && null !== $data['endpoint']) {
                $object->setEndpoint($data['endpoint']);
                unset($data['endpoint']);
            } elseif (\array_key_exists('endpoint', $data) && null === $data['endpoint']) {
                $object->setEndpoint(null);
            }
            if (\array_key_exists('description', $data) && null !== $data['description']) {
                $object->setDescription($data['description']);
                unset($data['description']);
            } elseif (\array_key_exists('description', $data) && null === $data['description']) {
                $object->setDescription(null);
            }
            if (\array_key_exists('sandbox', $data) && null !== $data['sandbox']) {
                $object->setSandbox($data['sandbox']);
                unset($data['sandbox']);
            } elseif (\array_key_exists('sandbox', $data) && null === $data['sandbox']) {
                $object->setSandbox(null);
            }
            if (\array_key_exists('subscribed_events', $data) && null !== $data['subscribed_events']) {
                $object->setSubscribedEvents($data['subscribed_events']);
                unset($data['subscribed_events']);
            } elseif (\array_key_exists('subscribed_events', $data) && null === $data['subscribed_events']) {
                $object->setSubscribedEvents(null);
            }
            if (\array_key_exists('secret_key', $data) && null !== $data['secret_key']) {
                $object->setSecretKey($data['secret_key']);
                unset($data['secret_key']);
            } elseif (\array_key_exists('secret_key', $data) && null === $data['secret_key']) {
                $object->setSecretKey(null);
            }
            if (\array_key_exists('scopes', $data) && null !== $data['scopes']) {
                $object->setScopes($data['scopes']);
                unset($data['scopes']);
            } elseif (\array_key_exists('scopes', $data) && null === $data['scopes']) {
                $object->setScopes(null);
            }
            if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
                $object->setWorkspaces($data['workspaces']);
                unset($data['workspaces']);
            } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
                $object->setWorkspaces(null);
            }
            if (\array_key_exists('auto_retry', $data) && null !== $data['auto_retry']) {
                $object->setAutoRetry($data['auto_retry']);
                unset($data['auto_retry']);
            } elseif (\array_key_exists('auto_retry', $data) && null === $data['auto_retry']) {
                $object->setAutoRetry(null);
            }
            if (\array_key_exists('enabled', $data) && null !== $data['enabled']) {
                $object->setEnabled($data['enabled']);
                unset($data['enabled']);
            } elseif (\array_key_exists('enabled', $data) && null === $data['enabled']) {
                $object->setEnabled(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            if ($object->isInitialized('endpoint') && null !== $object->getEndpoint()) {
                $data['endpoint'] = $object->getEndpoint();
            }
            if ($object->isInitialized('description') && null !== $object->getDescription()) {
                $data['description'] = $object->getDescription();
            }
            if ($object->isInitialized('sandbox') && null !== $object->getSandbox()) {
                $data['sandbox'] = $object->getSandbox();
            }
            if ($object->isInitialized('subscribedEvents') && null !== $object->getSubscribedEvents()) {
                $data['subscribed_events'] = $object->getSubscribedEvents();
            }
            if ($object->isInitialized('secretKey') && null !== $object->getSecretKey()) {
                $data['secret_key'] = $object->getSecretKey();
            }
            if ($object->isInitialized('scopes') && null !== $object->getScopes()) {
                $data['scopes'] = $object->getScopes();
            }
            if ($object->isInitialized('workspaces') && null !== $object->getWorkspaces()) {
                $data['workspaces'] = $object->getWorkspaces();
            }
            if ($object->isInitialized('autoRetry') && null !== $object->getAutoRetry()) {
                $data['auto_retry'] = $object->getAutoRetry();
            }
            if ($object->isInitialized('enabled') && null !== $object->getEnabled()) {
                $data['enabled'] = $object->getEnabled();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UpdateWebhookSubscription::class => false];
        }
    }
}
