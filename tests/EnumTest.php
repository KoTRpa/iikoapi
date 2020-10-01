<?php

namespace KMA\IikoApi\Tests;


use PHPUnit\Framework\TestCase;

use KMA\IikoApi\Entity\Enum\DeliveryStatus;
use KMA\IikoApi\Entity\Enum\OrderStatus;
use KMA\IikoApi\Entity\Enum\ru\OrderStatus as OrderStatusRU;

class EnumTest extends TestCase
{
    public function testDeliveryStatus(): void
    {
        $existsStatus = 'ON_WAY';
        $notExists = 'adsa';

        $this->assertTrue(DeliveryStatus::exists($existsStatus));
        $this->assertFalse(DeliveryStatus::exists($notExists));
    }

    public function testOrderStatus(): void
    {
        $existsStatus = 'In progress';
        $notExists = 'adsa';

        $this->assertTrue(OrderStatus::exists($existsStatus));
        $this->assertFalse(OrderStatus::exists($notExists));
    }


    public function testRuOrderStatus(): void
    {
        $existsStatus = 'Не подтверждена';
        $notExists = 'adsa';

        $this->assertTrue(OrderStatusRU::exists($existsStatus));
        $this->assertFalse(OrderStatusRU::exists($notExists));
    }
}
