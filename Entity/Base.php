<?php

namespace KMA\IikoApi\Entity;

use Exception;
use KMA\IikoApi\Extend\Jsonable;

abstract class Base implements Jsonable
{
    /**
     * @return string
     * @throws Exception
     */
    public function toJson(): string
    {
        $result = [];

        foreach ($this as $key => $value) {
            if ($this->$key !== null) {
                $result[$key] = $value;
            }
        }

        return \GuzzleHttp\json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
