<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Entities\DeliveryTerminal;

/**
 * Trait DeliverySettings
 * @package KMA\IikoApi\Api *
 *
 * @mixin Http
 * @mixin Iiko
 */
trait DeliverySettings
{
    /**
     * Вернуть список доставочных ресторанов, подключённых к данному ресторану
     * Примечание: Каждый iikoRMS с зарегистрированным терминалом доставки в КЦ должен быть зарегистрирован как отдельная организация в iiko.biz.
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.kqcxqxlnde8c
     *
     * @param string $organization GUID организации
     * @return \KMA\IikoApi\Entities\DeliveryTerminal[]
     * @throws \JsonMapper_Exception|\KMA\IikoApi\Exceptions\IikoApiException
     */
    public function getDeliveryTerminals(string $organization): array
    {
        $endpoint = '/deliverySettings/getDeliveryTerminals';

        $params = [
            'access_token' => $this->token(),
            'organization' => $organization,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json->deliveryTerminals, [], DeliveryTerminal::class
        );
    }
}
