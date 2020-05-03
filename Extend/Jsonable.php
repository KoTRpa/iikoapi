<?php

namespace KMA\IikoApi\Extend;

interface Jsonable
{
    public function toJson(): string;
}