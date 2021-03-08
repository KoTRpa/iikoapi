<?php

namespace KMA\IikoApi\Tests;

use KMA\IikoApi\Entity\OrderInfo;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    /**
     * @dataProvider orderJsonProvider
     */
    public function testOrderHashable($json, $hash): void
    {
        $order = \GuzzleHttp\json_decode($json, false);;

        /** @var OrderInfo $orderInfo */
        $orderInfo = (new \JsonMapper())->map(
            $order, new OrderInfo
        );

        $calculated = $orderInfo->hash;
        
        $this->assertEquals($hash, $calculated);
    }

    public function orderJsonProvider()
    {
        return [
            [
                'json' => '{"customer":{"sex":0,"id":"ca3a6268-f073-4e40-a3ea-19f86791032c","externalId":"4e17b5c4-4f20-11ea-80f2-d8d38565926f","name":"Дарима","surName":"","nick":"","comment":"","phone":"+79025450061","additionalPhones":[],"addresses":[],"cultureName":null,"birthday":null,"email":null,"middleName":null,"shouldReceivePromoActionsInfo":true,"counteragentInfo":null},"orderId":"104081e6-6b78-647d-3a6a-7f8dd2e35e3d","customerId":"ca3a6268-f073-4e40-a3ea-19f86791032c","movedDeliveryId":null,"customerName":"Дарима","customerPhone":null,"address":{"city":"Москва","street":"----------","streetId":"f8aaf1ec-8f46-907f-9357-e4c27bab5f78","streetClassifierId":null,"index":"","home":"17","housing":"","apartment":"58","entrance":"","floor":null,"doorphone":null,"comment":"Улица Гоголя, Дом 17, Квартира58\nИркутск Улица Гоголя 17 58","regionId":null,"externalCartographyId":null},"restaurantId":"53a82c4e-5df1-11ea-80de-d8d385655247","organization":"53a82c4e-5df1-11ea-80de-d8d385655247","sum":1410.000000000,"discount":0.0,"number":"66923","status":"Не подтверждена","statusCode":"UNCONFIRMED","deliveryCancelCause":null,"deliveryCancelComment":null,"courierInfo":null,"orderLocationInfo":{"latitude":55.8701871,"longitude":37.469774},"deliveryDate":"2020-11-11 21:45:00","actualTime":null,"billTime":null,"cancelTime":null,"closeTime":null,"confirmTime":null,"createdTime":"2020-11-11 22:21:00","printTime":null,"sendTime":null,"comment":"\nТелефон: +79025450061\nКол-во персон: 2\nОплата: картой курьеру\nЗаказ с сайта: https://kimchi.ru\nСумма заказа: 1410\n","problem":{"hasProblem":true,"problem":"Не удалось найти точку доставки с учетом настроенных ограничений. \n Ошибка обработки: не удалось найти улицу Улица Гоголя  в городе Иркутск"},"operator":{"id":"189be76a-4d31-4a25-8bb1-caeed11f5b81","firstName":"Александр","middleName":"Васильевич","lastName":"Борисенко","displayName":"Борисенко А.В.","phone":"89834440720","cellPhone":null,"email":null,"code":"3338","pinCode":"","note":null,"mainRole":{"id":"b3f12f9c-b80c-41e6-b44d-d599ddb67ee4","name":"Оператор колл-центра","code":"Колл-центр","paymentPerHour":136.363636364,"steadySalary":30000.000000000,"comment":"","scheduleType":"STEADY_SALARY","externalRevision":1063126,"deleted":false},"roles":[{"id":"b3f12f9c-b80c-41e6-b44d-d599ddb67ee4","name":"Оператор колл-центра","code":"Колл-центр","paymentPerHour":136.363636364,"steadySalary":30000.000000000,"comment":"","scheduleType":"STEADY_SALARY","externalRevision":1063126,"deleted":false}],"deleted":false,"externalRevision":1021126},"conception":null,"marketingSource":null,"durationInMinutes":60,"personsCount":1,"splitBetweenPersons":false,"items":[{"id":"fccab0c0-3b73-43c1-881f-0276211bd87f","orderItemId":"00000000-0000-0000-0000-000000000000","code":"00697","name":"Салат Китайский \"домашний\"","category":null,"amount":1.000000000,"size":null,"modifiers":[],"sum":300.000000000,"comment":null,"guestId":"02e8e4dc-ae0c-675e-0175-b798b0450250","comboInformation":null},{"id":"74f6e3ec-7666-4b41-b105-e462040136bc","orderItemId":"00000000-0000-0000-0000-000000000000","code":"02559","name":"Острая лапша с курицей ","category":null,"amount":1.000000000,"size":null,"modifiers":[{"id":"e18033b1-593f-4f66-9690-6ac7403fc55d","orderItemId":"00000000-0000-0000-0000-000000000000","name":"средне остро","amount":1.000000000,"groupId":"26974054-6a51-4729-93a5-1f6c78375042","groupName":"степень остроты","size":null,"comboInformation":null,"sum":0.0,"code":null,"category":null}],"sum":310.000000000,"comment":null,"guestId":"02e8e4dc-ae0c-675e-0175-b798b0450250","comboInformation":null},{"id":"d263f81c-bb69-472e-aedb-4a6be038b775","orderItemId":"00000000-0000-0000-0000-000000000000","code":"00642","name":"Губажоу с курицей","category":null,"amount":1.000000000,"size":null,"modifiers":[],"sum":380.000000000,"comment":null,"guestId":"02e8e4dc-ae0c-675e-0175-b798b0450250","comboInformation":null},{"id":"ed9b2f81-f908-4682-8af2-cc1c45ad45f9","orderItemId":"00000000-0000-0000-0000-000000000000","code":"01334","name":"Ччампонг","category":null,"amount":1.000000000,"size":null,"modifiers":[],"sum":420.000000000,"comment":null,"guestId":"02e8e4dc-ae0c-675e-0175-b798b0450250","comboInformation":null}],"guests":[{"id":"02e8e4dc-ae0c-675e-0175-b798b0450250","name":"Дарима"}],"payments":[{"sum":1410.000000000,"paymentType":{"id":"408eb7e0-3192-49e9-b65e-e2fee84b26fa","code":"CARD1","name":"САЙТ Visa","comment":"","combinable":true,"externalRevision":520857,"applicableMarketingCampaigns":null,"deleted":false},"additionalData":null,"isProcessedExternally":false,"isPreliminary":false,"isExternal":true,"chequeAdditionalInfo":null,"organizationDetailsInfo":null,"isFiscalizedExternally":false}],"orderType":{"id":"76067ea3-356f-eb93-9d14-1fa00d082c4e","name":"Доставка курьером","orderServiceType":"DELIVERY_BY_COURIER","externalRevision":1703},"deliveryTerminal":null,"discounts":[],"iikoCard5Coupon":null,"customData":null,"opinion":{"organization":null,"deliveryId":"104081e6-6b78-647d-3a6a-7f8dd2e35e3d","comment":null,"marks":[]},"referrerId":null}',
                'hash' => 'ab6478be41139fc67ecfd96bb053b0f9',
            ],
        ];
    }
}
