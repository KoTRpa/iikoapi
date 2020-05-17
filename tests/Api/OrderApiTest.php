<?php

namespace KMA\IikoApi\Tests\Api;

use KMA\IikoApi\Api;
use KMA\IikoApi\Config;
use KMA\IikoApi\Entity\Address;
use KMA\IikoApi\Entity\Customer;
use KMA\IikoApi\Entity\Order;
use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderItem;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Provider\DemoConfigProvider;
use PHPUnit\Framework\TestCase;

class OrderApiTest extends TestCase
{
    public function setUp(): void
    {
        Config::init(new DemoConfigProvider());
    }

    public function testAdd()
    {
        $orgId = 'e464c693-4a57-11e5-80c1-d8d385655247';

        $customer = new Customer();
        $customer->name = 'Иван';
        $customer->phone = '71235678901';

        $address = new Address();
        $address->city = 'Москва';
        $address->street = 'Красная площадь';
        $address->home = '1';
        $address->apartment = '14';

        $products = [
            [
                "id" => "75c14ee6-bccd-4f52-8410-3806a9d592dd",
                "name" => "Паста с говядиной",
                "amount" => 2,
                "code" => "0003",
                "sum" => 200,
            ],
            [
                "id" => "8842b207-1546-483b-945a-5eed6279139d",
                "name" => "Салат из свежих помидоров и огурцов",
                "amount" => 3,
                "code" => "0029",
                "sum" => 420,
            ],
            [
                "id" => "03190633-77b4-4d02-b3bb-e5d691faf29d",
                "name" => "Сидр",
                "amount" => 3,
                "code" => "0006",
                "sum" => 936
            ],
            [
                "id" => "12c6877e-cd1f-49d0-a09d-ba04318c9ad1",
                "name" => "Щи",
                "amount" => 3,
                "code" => "00031",
                "sum" => 240
            ]
        ];
        
        $order = new Order();
        $order->date = date('Y-m-d H:i:s');
        $order->phone = '71235678901';
        $order->isSelfService = true;
        $order->address = $address;
        $order->items = array_map(function ($product) {
            $res = new OrderItem();
            $res->id = $product["id"];
            $res->name = $product["name"];
            $res->amount = $product["amount"];
            $res->code = $product["code"];
            $res->sum = $product["sum"];
            return $res;
        }, $products);
        
        $orderRequest = new OrderRequest();
        $orderRequest->organization = $orgId;
        $orderRequest->customer = $customer;
        $orderRequest->order = $order;

        $this->assertInstanceOf(OrderInfo::class, Api::order()->add($orderRequest));
    }
}
