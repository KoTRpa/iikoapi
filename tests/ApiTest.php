<?php

namespace KMA\IikoApi\Tests;

use KMA\IikoApi\Config;
use KMA\IikoApi\Provider\DemoConfigProvider;
use PHPUnit\Framework\TestCase;

use KMA\IikoApi\Api;

class ApiTest extends TestCase
{
    protected function setUp(): void
    {
        Config::init(new DemoConfigProvider());
    }

    public function testOrderInstanceGet(): void
    {
        $this->assertInstanceOf(
            Api\Order::class,
            Api::order()
        );
    }

    public function testOrganizationInstanceGet(): void
    {
        $this->assertInstanceOf(
            Api\Organization::class,
            Api::organization()
        );
    }
}
