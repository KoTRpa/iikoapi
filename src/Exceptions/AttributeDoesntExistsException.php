<?php

namespace KMA\IikoApi\Exceptions;

use RuntimeException;

class AttributeDoesntExistsException extends RuntimeException
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
     * Create a new exception instance.
     *
     * @param  string  $entity
     * @param  string  $attribute
     */
    public function __construct(string $entity, string $attribute)
    {
        parent::__construct("Try to access doesn't exists attribute [{$attribute}] in entity [{$entity}]");

        $this->entity = $entity;
        $this->attribute = $attribute;
    }
}
