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

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer as BaseDateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Fixes base Symfony's DateTimeNormalizer where passing a DateTimeInterface crashes the denormalization
 */
class DateTimeNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /** @var BaseDateTimeNormalizer */
    protected $baseNormalizer;

    /**
     * @param BaseDateTimeNormalizer $baseNormalizer
     */
    public function __construct(BaseDateTimeNormalizer $baseNormalizer)
    {
        $this->baseNormalizer = $baseNormalizer;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        if ($data instanceof \DateTimeInterface) {
            return $data;
        }

        return $this->baseNormalizer->denormalize($data, $type, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return $this->baseNormalizer->supportsDenormalization($data, $type, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return $this->baseNormalizer->normalize($object, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null, array $context = [])
    {
        return $this->baseNormalizer->supportsNormalization($data, $format, $context);
    }
}
