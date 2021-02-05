<?php


namespace KMA\IikoApi\Entities\Type;


class TimeSpan
{
    private int $h, $m, $s;

    private const FORMAT = '%d:%d:%d';

    public function __construct(int $h = 0, int $m = 0, int $s= 0)
    {
        if ($h < 0 || $h > 23 || $m < 0 || $m > 59 || $s < 0 || $s > 59) {
            throw new \InvalidArgumentException('Wrong time format');
        }

        $this->h = $h;
        $this->m = $m;
        $this->s = $s;
    }

    public function __toString(): string
    {
        return $this->get();
    }

    public function get(): string
    {
        return sprintf(
            self::FORMAT,
            $this->h, $this->m, $this->s
        );
    }

    public static function hour(int $count = 1): TimeSpan
    {
        return new self($count, 0, 0);
    }

    public static function minute(int $count = 1): TimeSpan
    {
        return new self( 0, $count, 0);
    }

    public static function second(int $count = 1): TimeSpan
    {
        return new self( 0,  0, $count);
    }
}
