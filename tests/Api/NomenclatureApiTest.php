<?php

namespace KMA\IikoApi\Tests\Api;

use KMA\IikoApi\Api;
use KMA\IikoApi\Api\Organization;
use KMA\IikoApi\Config;
use KMA\IikoApi\Entity\Nomenclature;
use KMA\IikoApi\Provider\DemoConfigProvider;
use PHPUnit\Framework\TestCase;

class NomenclatureApiTest extends TestCase
{
    public function setUp(): void
    {
        Config::init(new DemoConfigProvider());
    }

    public function testGet()
    {
        $products = Api::nomenclature();
        $orgId = 'e464c693-4a57-11e5-80c1-d8d385655247';
        $this->assertInstanceOf(Nomenclature::class, $products->get($orgId));
    }
}
