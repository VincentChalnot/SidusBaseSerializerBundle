<?php
/*
 * This file is part of the Sidus/BaseSerializerBundle package.
 *
 * Copyright (c) 2015-2019 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\BaseSerializerBundle\Serializer\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Used to enable NestedPropertyDenormalizer on a class
 *
 * @see \Sidus\BaseSerializerBundle\Serializer\Normalizer\NestedPropertyDenormalizer
 *
 * @Annotation()
 *
 * @Target("CLASS")
 */
class NestedPropertyDenormalizer
{
}
