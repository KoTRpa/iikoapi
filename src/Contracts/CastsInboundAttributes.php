<?php

namespace KMA\IikoApi\Contracts;

use KMA\IikoApi\Entity;

interface CastsInboundAttributes
{
    /**
     * Transform the attribute to its underlying entity values.
     *
     * @param  \KMA\IikoApi\Entity  $entity
     * @param  string $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set(Entity $entity, string $key, $value, array $attributes);
}
