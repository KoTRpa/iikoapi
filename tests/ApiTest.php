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

    public function testOrganizationInstanceGet(): void
    {
        $this->assertInstanceOf(
            Api\OrganizationApi::class,
            Api::organization()
        );
    }

    public function testNomenclatureInstanceGet(): void
    {
        $this->assertInstanceOf(
            Api\NomenclatureApi::class,
            Api::nomenclature()
        );
    }

    public function testOrderInstanceGet(): void
    {
        $this->assertInstanceOf(
            Api\OrderApi::class,
            Api::order()
        );
    }
}
