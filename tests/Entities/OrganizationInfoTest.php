<?php

namespace KMA\IikoApi\Tests\Entities;

use KMA\IikoApi\Entities\OrganizationInfo;
use PHPUnit\Framework\TestCase;

class OrganizationInfoTest extends TestCase
{
    public function testSetNonExistsAttributeThrowsException()
    {
        $this->expectException(\KMA\IikoApi\Exceptions\AttributeDoesntExistsException::class);

        $sample = new OrganizationInfo;
        $sample->idc = 'abc';
    }

    public function testSetGetAttribute()
    {
        $string = 'test string';
        $contact = $this->createMock(\KMA\IikoApi\Entities\ContactInfo::class);
        $float = 35.55;

        $sample = new OrganizationInfo;
        $sample->id = $string;
        $sample->name = $string;
        $sample->description = $string;
        $sample->logo = $string;
        $sample->contact = $contact;
        $sample->homePage = $string;
        $sample->address = $string;
        $sample->isActive = true;
        $sample->longitude = $float;
        $sample->latitude = $float;
        $sample->networkId = $string;
        $sample->logoImage = $string;
        $sample->phone = $string;
        $sample->website = $string;
        $sample->averageCheque = $string;
        $sample->workTime = $string;
        $sample->bizOrganizationType = 1;
        $sample->currencyIsoName = $string;
        
        $this->assertSame($string, $sample->id);
        $this->assertSame($string, $sample->name);
        $this->assertSame($string, $sample->description);
        $this->assertSame($string, $sample->logo);
        $this->assertSame($string, $sample->contact);
        $this->assertSame($string, $sample->homePage);
        $this->assertSame($string, $sample->address);
        $this->assertSame(true, $sample->isActive);
        $this->assertSame($float, $sample->longitude);
        $this->assertSame($float, $sample->latitude);
        $this->assertSame($string, $sample->networkId);
        $this->assertSame($string, $sample->logoImage);
        $this->assertSame($string, $sample->phone);
        $this->assertSame($string, $sample->website);
        $this->assertSame($string, $sample->averageCheque);
        $this->assertSame($string, $sample->workTime);
        $this->assertSame(1, $sample->bizOrganizationType);
        $this->assertSame($string, $sample->currencyIsoName);
    }

    public function testSetNullValue()
    {
        $sample = new OrganizationInfo;
        $sample->description = null;

        $this->assertObjectHasAttribute('description', $sample);
        $this->assertNull($sample->description);
    }
}
