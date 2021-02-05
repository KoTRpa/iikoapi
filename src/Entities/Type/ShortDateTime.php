<?php

namespace KMA\IikoApi\Entities\Type;

/* TODO: validation and create from several sources */
class ShortDateTime
{
    // Строка в формате “dd.MM.yyyy”
    private string $date;

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function __toString()
    {
        return $this->date;
    }
}
