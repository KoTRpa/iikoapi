<?php


namespace KMA\IikoApi\Traits;


trait Validator
{
    /**
     * Determine given string is a json object.
     *
     * @param string $string A json string
     * @return bool
     */
    protected function isJson($string): bool
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }
}
