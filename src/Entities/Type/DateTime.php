<?php

namespace KMA\IikoApi\Entities\Type;

/**
 * Class DateTime
 * @package KMA\IikoApi\Entities\Type
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.jd021duvj8rx
 * TODO: maybe make native DateTime from string?
 */
class DateTime
{
    // Строка в формате “YYYY-MM-DD hh:mm:ss”, где
    // YYYY - год;
    // MM - месяц (начиная с 1 - январь);
    // DD - день;
    // hh - час (от 00 до 23);
    // mm - минута (от 00 до 59);
    // ss - секунда (от 00 до 59).

    public string $date;

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function __toString()
    {
        return $this->date;
    }
}
