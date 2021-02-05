<?php

namespace KMA\IikoApi\Entities\Enum;

use KMA\IikoApi\Traits\Enum;

class OrderStatus
{
    use Enum;

    public const NEW               = 'New';
    public const AWAITING_DELIVERY = 'Awaiting delivery';
    public const ON_THE_WAY        = 'On the way';
    public const CLOSED            = 'Closed';
    public const CANCELLED         = 'Cancelled';
    public const DELIVERED         = 'Delivered';
    public const NOT_CONFIRMED     = 'Not confirmed';
    public const IN_PROGRESS       = 'In progress';
    public const READY             = 'Ready';
}
