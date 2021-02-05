<?php

namespace KMA\IikoApi\Exceptions;

use RuntimeException;

class InvalidCastException extends RuntimeException
{
    /**
     * The name of the affected Entities.
     *
     * @var string
     */
    public string $entity;

    /**
     * The name of the attribute.
     *
     * @var string
     */
    public string $attribute;

    /**
     * The name of the cast type.
     *
     * @var string
     */
    public string $castType;

    /**
     * Create a new exception instance.
     *
     * @param  string  $entity
     * @param  string  $attribute
     * @param  string  $castType
     */
    public function __construct(string $entity, string $attribute, string $castType)
    {
        parent::__construct("Call to undefined cast [{$castType}] on attribute [{$attribute}] in entity [{$entity}].");

        $this->entity = $entity;
        $this->attribute = $attribute;
        $this->castType = $castType;
    }
}
