<?php

namespace KMA\IikoApi;

use ArrayAccess;

use KMA\IikoApi\Concerns;

abstract class Entity implements ArrayAccess
{
    use
        Concerns\HasAttributes,
        Concerns\FromJSON;

    /**
     * Create a new Entities instance.
     *
     * @param  null|string  $json
     * @return void
     * @throws \JsonException
     */
    public function __construct(?string $json = null)
    {
        if (null !== $json) {
            $attributes = $this->fromJson($json);
            $this->fill($attributes);
        }
    }

    /**
     * Fill the entity with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     */
    public function fill(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  string  $value
     * @return void
     */
    public function __set(string $key, string $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return ! is_null($this->getAttribute($offset));
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

    /**
     * Determine if an attribute exists on the entity.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset(string $key): bool
    {
        return $this->offsetExists($key);
    }

    /**
     * Unset an attribute on the entity.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset(string $key)
    {
        $this->offsetUnset($key);
    }
}
