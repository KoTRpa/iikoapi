<?php

namespace KMA\IikoApi\Entities;

use Exception;
use JsonException;

use KMA\IikoApi\Entities\Concerns;

abstract class Entity implements \JsonSerializable
{
    use Concerns\HasAttributes;

    /**
     * @var array decoded json
     */
    protected array $decoded = [];

    /**
     * Create a new Entities instance.
     *
     * @param  string  $json
     * @return void
     * @throws \JsonException
     */
    public function __construct(string $json)
    {
        $attributes = $this->decode($json);
        $this->fill($attributes);
    }

    /**
     * Decode json from string
     *
     * @param string $json
     * @param bool $asObject
     * @return array
     * @throws \JsonException
     */
    public function decode(string $json, bool $asObject = false): array
    {
        $data = json_decode($json, !$asObject);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException('Invalid JSON: ' . json_last_error_msg());
        }

        // Mostly for debugging purpose
        $this->decoded = $data;

        return $data;
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
     * @return array
     * @throws Exception
     */
    public function jsonSerialize(): array
    {
        return array_filter((array)$this, function ($el) {
            return ($el !== null);
        });
    }

    protected static function clear(array $data): array
    {
        return array_filter($data, function ($el) {
            return ($el !== null);
        });
    }

}
