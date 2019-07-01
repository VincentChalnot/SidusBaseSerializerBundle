<?php
/*
 * This file is part of the Sidus/BaseSerializerBundle package.
 *
 * Copyright (c) 2015-2019 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\BaseSerializerBundle\Serializer\Normalizer;

use Sidus\BaseSerializerBundle\Serializer\Annotation\PropertyNormalizer as PropertyNormalizerAnnotation;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer as BasePropertyNormalizer;

/**
 * Inherits the base property normalizer and simply checks if class has the annotation to activate this normalizer
 *
 * @property NormalizerInterface|DenormalizerInterface $serializer
 */
class PropertyNormalizer extends BasePropertyNormalizer
{
    /** @var AnnotationReader */
    protected $annotationReader;

    /**
     * @param AnnotationReader $annotationReader
     */
    public function setAnnotationReader(AnnotationReader $annotationReader)
    {
        $this->annotationReader = $annotationReader;
    }

    /**
     * Only supports class with the NestedPropertyDenormalizer annotation
     *
     * {@inheritDoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    /**
     * Never supports normalization, only denormalization
     *
     * {@inheritDoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        if (!\is_object($data)) {
            return false;
        }
        $classAnnotation = $this->annotationReader->getClassAnnotation(
            new \ReflectionClass($data),
            PropertyNormalizerAnnotation::class
        );

        return $classAnnotation instanceof PropertyNormalizerAnnotation;
    }
}
