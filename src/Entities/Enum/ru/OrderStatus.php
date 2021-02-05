<?php

namespace KMA\IikoApi\Entities\Enum\ru;

use KMA\IikoApi\Traits\Enum;

class OrderStatus
{
    use Enum;

    public const NEW               = 'Новая';
    public const AWAITING_DELIVERY = 'Ждет отправки';
    public const ON_THE_WAY        = 'В пути';
    public const CLOSED            = 'Закрыта';
    public const CANCELLED         = 'Отменена';
    public const DELIVERED         = 'Доставлена';
    public const NOT_CONFIRMED     = 'Не подтверждена';
    public const IN_PROGRESS       = 'Готовится';
    public const READY             = 'Готово';
}
