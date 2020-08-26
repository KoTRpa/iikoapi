<?php

namespace KMA\IikoApi\Entity;

use Exception;

abstract class Base extends \ArrayObject implements \JsonSerializable
{
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
