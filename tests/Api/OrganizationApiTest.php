<?php

namespace KMA\IikoApi\Tests\Api;

use KMA\IikoApi\Api;
use KMA\IikoApi\Api\Organization;
use KMA\IikoApi\Config;
use KMA\IikoApi\Provider\DemoConfigProvider;
use PHPUnit\Framework\TestCase;

class OrganizationTest extends TestCase
{
    public function setUp(): void
    {
        Config::init(new DemoConfigProvider());
    }

    public function testGet()
    {
        $org = Api::organization();
        
        $this->assertIsArray($org->get());
    }
}
