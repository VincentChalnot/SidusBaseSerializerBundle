Sidus/BaseBundle Documentation
==================================

## Serializer

The NestedPropertyDenormalizer can be very useful for denormalizing API responses into proper model entities, it works
without any setters and can denormalize embed data and embed entity collections based on very simple annotations.

This denormalizer will only work on PHP classes with the ```@NestedPropertyDenormalizer``` annotation.

### Configuration

Configuration example

```php
<?php

namespace FooBar\Model;

use Sidus\BaseSerializerBundle\Serializer\Annotation\NestedClass;
use Sidus\BaseSerializerBundle\Serializer\Annotation\NestedPropertyDenormalizer;

/**
 * @NestedPropertyDenormalizer()
 */
class Book
{
    /** @var string */
    protected $id;
    
    /**
     * @var \DateTimeInterface|null
     *
     * @NestedClass(targetClass="DateTime")
     */
    protected $publicationDate;
    
    /**
     * @var Author|null
     *
     * @NestedClass(targetClass="FooBar\Model\Author")
     */
    protected $author;

    /**
     * @var Edition[]
     *
     * @NestedClass(targetClass="FooBar\Model\Edition", multiple=true)
     */
    protected $editions = [];
    
    // Here be getters (no setters needed)
}
```

Note that the ```@NestedClass``` annotation can target any class.

### Additional services

This bundle also features additional services that can be used by other bundles.
Implementation details are not provided as they are only needed in custom normalizers.
