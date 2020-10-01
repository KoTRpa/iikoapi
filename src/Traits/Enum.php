<?php

namespace KMA\IikoApi\Traits;


trait Enum
{
    public static function exists(string $status): bool
    {
        $ref = new \ReflectionClass(__CLASS__);
        $statuses = $ref->getConstants();
        return in_array($status, $statuses, true);
    }

}
