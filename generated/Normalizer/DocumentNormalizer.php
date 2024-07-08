<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\DocumentInitials;
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
    class DocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Document::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\Document::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Document();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('filename', $data) && null !== $data['filename']) {
                $object->setFilename($data['filename']);
                unset($data['filename']);
            } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
                $object->setFilename(null);
            }
            if (\array_key_exists('nature', $data) && null !== $data['nature']) {
                $object->setNature($data['nature']);
                unset($data['nature']);
            } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
                $object->setNature(null);
            }
            if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
                $object->setContentType($data['content_type']);
                unset($data['content_type']);
            } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
                $object->setContentType(null);
            }
            if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
                $object->setSha256($data['sha256']);
                unset($data['sha256']);
            } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
                $object->setSha256(null);
            }
            if (\array_key_exists('is_protected', $data) && null !== $data['is_protected']) {
                $object->setIsProtected($data['is_protected']);
                unset($data['is_protected']);
            } elseif (\array_key_exists('is_protected', $data) && null === $data['is_protected']) {
                $object->setIsProtected(null);
            }
            if (\array_key_exists('is_signed', $data) && null !== $data['is_signed']) {
                $object->setIsSigned($data['is_signed']);
                unset($data['is_signed']);
            } elseif (\array_key_exists('is_signed', $data) && null === $data['is_signed']) {
                $object->setIsSigned(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('total_pages', $data) && null !== $data['total_pages']) {
                $object->setTotalPages($data['total_pages']);
                unset($data['total_pages']);
            } elseif (\array_key_exists('total_pages', $data) && null === $data['total_pages']) {
                $object->setTotalPages(null);
            }
            if (\array_key_exists('is_locked', $data) && null !== $data['is_locked']) {
                $object->setIsLocked($data['is_locked']);
                unset($data['is_locked']);
            } elseif (\array_key_exists('is_locked', $data) && null === $data['is_locked']) {
                $object->setIsLocked(null);
            }
            if (\array_key_exists('initials', $data) && null !== $data['initials']) {
                $object->setInitials($this->denormalizer->denormalize($data['initials'], DocumentInitials::class, 'json', $context));
                unset($data['initials']);
            } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
                $object->setInitials(null);
            }
            if (\array_key_exists('total_anchors', $data) && null !== $data['total_anchors']) {
                $object->setTotalAnchors($data['total_anchors']);
                unset($data['total_anchors']);
            } elseif (\array_key_exists('total_anchors', $data) && null === $data['total_anchors']) {
                $object->setTotalAnchors(null);
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
            $data['filename'] = $object->getFilename();
            $data['nature'] = $object->getNature();
            $data['content_type'] = $object->getContentType();
            $data['sha256'] = $object->getSha256();
            $data['is_protected'] = $object->getIsProtected();
            $data['is_signed'] = $object->getIsSigned();
            $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\TH:i:sP');
            $data['total_pages'] = $object->getTotalPages();
            $data['is_locked'] = $object->getIsLocked();
            $data['initials'] = $this->normalizer->normalize($object->getInitials(), 'json', $context);
            $data['total_anchors'] = $object->getTotalAnchors();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Document::class => false];
        }
    }
} else {
    class DocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Document::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\Document::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Document();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('filename', $data) && null !== $data['filename']) {
                $object->setFilename($data['filename']);
                unset($data['filename']);
            } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
                $object->setFilename(null);
            }
            if (\array_key_exists('nature', $data) && null !== $data['nature']) {
                $object->setNature($data['nature']);
                unset($data['nature']);
            } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
                $object->setNature(null);
            }
            if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
                $object->setContentType($data['content_type']);
                unset($data['content_type']);
            } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
                $object->setContentType(null);
            }
            if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
                $object->setSha256($data['sha256']);
                unset($data['sha256']);
            } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
                $object->setSha256(null);
            }
            if (\array_key_exists('is_protected', $data) && null !== $data['is_protected']) {
                $object->setIsProtected($data['is_protected']);
                unset($data['is_protected']);
            } elseif (\array_key_exists('is_protected', $data) && null === $data['is_protected']) {
                $object->setIsProtected(null);
            }
            if (\array_key_exists('is_signed', $data) && null !== $data['is_signed']) {
                $object->setIsSigned($data['is_signed']);
                unset($data['is_signed']);
            } elseif (\array_key_exists('is_signed', $data) && null === $data['is_signed']) {
                $object->setIsSigned(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('total_pages', $data) && null !== $data['total_pages']) {
                $object->setTotalPages($data['total_pages']);
                unset($data['total_pages']);
            } elseif (\array_key_exists('total_pages', $data) && null === $data['total_pages']) {
                $object->setTotalPages(null);
            }
            if (\array_key_exists('is_locked', $data) && null !== $data['is_locked']) {
                $object->setIsLocked($data['is_locked']);
                unset($data['is_locked']);
            } elseif (\array_key_exists('is_locked', $data) && null === $data['is_locked']) {
                $object->setIsLocked(null);
            }
            if (\array_key_exists('initials', $data) && null !== $data['initials']) {
                $object->setInitials($this->denormalizer->denormalize($data['initials'], DocumentInitials::class, 'json', $context));
                unset($data['initials']);
            } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
                $object->setInitials(null);
            }
            if (\array_key_exists('total_anchors', $data) && null !== $data['total_anchors']) {
                $object->setTotalAnchors($data['total_anchors']);
                unset($data['total_anchors']);
            } elseif (\array_key_exists('total_anchors', $data) && null === $data['total_anchors']) {
                $object->setTotalAnchors(null);
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
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['filename'] = $object->getFilename();
            $data['nature'] = $object->getNature();
            $data['content_type'] = $object->getContentType();
            $data['sha256'] = $object->getSha256();
            $data['is_protected'] = $object->getIsProtected();
            $data['is_signed'] = $object->getIsSigned();
            $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\TH:i:sP');
            $data['total_pages'] = $object->getTotalPages();
            $data['is_locked'] = $object->getIsLocked();
            $data['initials'] = $this->normalizer->normalize($object->getInitials(), 'json', $context);
            $data['total_anchors'] = $object->getTotalAnchors();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Document::class => false];
        }
    }
}
