<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
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
    class WebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return WebhookSubscription::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && WebhookSubscription::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new WebhookSubscription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
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
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('updated_at', $data) && null !== $data['updated_at']) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            } elseif (\array_key_exists('updated_at', $data) && null === $data['updated_at']) {
                $object->setUpdatedAt(null);
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
            $data['id'] = $object->getId();
            $data['endpoint'] = $object->getEndpoint();
            $data['description'] = $object->getDescription();
            $data['sandbox'] = $object->getSandbox();
            $data['subscribed_events'] = $object->getSubscribedEvents();
            $data['secret_key'] = $object->getSecretKey();
            $data['scopes'] = $object->getScopes();
            $data['auto_retry'] = $object->getAutoRetry();
            $data['enabled'] = $object->getEnabled();
            $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
            $data['updated_at'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [WebhookSubscription::class => false];
        }
    }
} else {
    class WebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return WebhookSubscription::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && WebhookSubscription::class === $data::class;
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
            $object = new WebhookSubscription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
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
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('updated_at', $data) && null !== $data['updated_at']) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            } elseif (\array_key_exists('updated_at', $data) && null === $data['updated_at']) {
                $object->setUpdatedAt(null);
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
            $data['id'] = $object->getId();
            $data['endpoint'] = $object->getEndpoint();
            $data['description'] = $object->getDescription();
            $data['sandbox'] = $object->getSandbox();
            $data['subscribed_events'] = $object->getSubscribedEvents();
            $data['secret_key'] = $object->getSecretKey();
            $data['scopes'] = $object->getScopes();
            $data['auto_retry'] = $object->getAutoRetry();
            $data['enabled'] = $object->getEnabled();
            $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
            $data['updated_at'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [WebhookSubscription::class => false];
        }
    }
}
