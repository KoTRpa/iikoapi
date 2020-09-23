<?php

namespace KMA\IikoApi\Entity\Enum;

class DeliveryStatus
{
    public const NEW         = 'NEW';
    public const WAITING     = 'WAITING';
    public const ON_WAY      = 'ON_WAY';
    public const CLOSED      = 'CLOSED';
    public const CANCELLED   = 'CANCELLED';
    public const DELIVERED   = 'DELIVERED';
    public const UNCONFIRMED = 'UNCONFIRMED';

}
