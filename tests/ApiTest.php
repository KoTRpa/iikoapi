<?php

namespace KMA\IikoApi\Tests;


use PHPUnit\Framework\TestCase;

use KMA\IikoApi\Iiko;

class ApiTest extends TestCase
{
    protected $iiko;
    protected $orgId = 'e464c693-4a57-11e5-80c1-d8d385655247';

    protected function setUp(): void
    {
        $config = require(__DIR__ . '/../config/iiko.php');
        $this->iiko = new Iiko($config);
    }

    public function testNomenclature(): void
    {
        // orgId for test server
        $orgId = 'e464c693-4a57-11e5-80c1-d8d385655247';
        $this->assertInstanceOf(
            \KMA\IikoApi\Entity\Nomenclature::class,
            $this->iiko->nomenclature($orgId)
        );
    }

    public function testOrganizationList(): void
    {
        $orgList = $this->iiko->organizationList();
        $this->assertIsArray($orgList);
        foreach ($orgList as $orgInfo) {
            $this->assertInstanceOf(
                \KMA\IikoApi\Entity\OrganizationInfo::class,
                $orgInfo
            );
        }
    }
}
