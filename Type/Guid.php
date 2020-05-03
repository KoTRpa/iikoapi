<?php

namespace KMA\IikoApi\Type;

/* TODO: validate guid */
final class Guid
{
    private string $guid;

    public function __construct(string $guid)
    {
        $this->guid = $guid;
    }

    public function __toString(): string
    {
        return $this->guid;
    }
}