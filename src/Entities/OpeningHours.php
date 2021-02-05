<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Часы работы организации
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.8kq27v86l33n
 */
class OpeningHours extends Entity
{
    /** @var int Номер для недели, для которого указывается время работы. Нумерация начинается c 0, которому соответствует понедельник */
    public int $dayOfWeek;

    /** @var ?string Время, с которого работает заведение
     * Строка в формате “hh:mm”, где
     * hh - час (от 00 до 23);
     * mm - минута (от 00 до 59);
     */
    public ?string $from = null;

    /** @var ?string Время, до которого работает заведение.
     * Строка в формате “hh:mm”, где
     * hh - час (от 00 до 23);
     * mm - минута (от 00 до 59);
     */
    public ?string $to = null;

    /** @var bool Флаг отображающий, что заведение работает 24 часа */
    public bool $allDay;

    /** @var bool Флаг отображающий, что заведение не работает в этот день */
    public bool $closed;
}
