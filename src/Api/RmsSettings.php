<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\OrganizationUser;
use KMA\IikoApi\Entity\PaymentType;
use KMA\IikoApi\Entity\OrderTypesResponse;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * rmsSettings APIs
 * @package KMA\IikoApi\Api
 * @version 1.0.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait RmsSettings
{
    /**
     * sugar for getCouriers()
     *
     * @param string $organization
     * @return array
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function couriers(string $organization): array
    {
        return $this->getCouriers($organization);
    }

    /**
     * Возвращает список всех сотрудников, которые являются курьерами доставки в заданном ресторане.
     * Курьером доставки считается пользователь, обладающий правом “D_DCO” (быть курьером доставки).
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.gt76m85vdm6q
     *
     * @param string $organization iiko organization id
     * @return OrganizationUser[]
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function getCouriers(string $organization): array
    {
        $endpoint = '/rmsSettings/getCouriers';

        $params = [
            'access_token' => $this->token(),
            'organization' => $organization,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json->users, [], OrganizationUser::class
        );
    }

    /**
     * Запрос возвращает список внешних типов оплат для заданного ресторана.
     * Внешними считаются типы, процессинг которых идет не на стороне iiko.
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.c88aygwtq5iv
     *
     * @param string $organization
     * @return \KMA\IikoApi\Entity\PaymentType[]
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function getPaymentTypes(string $organization): array
    {
        $endpoint = '/rmsSettings/getPaymentTypes';

        $params = [
            'access_token' => $this->token(),
            'organization' => $organization,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json->paymentTypes, [], PaymentType::class
        );
    }

    /**
     * Получение списка допустимых типов заказов
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.v0yylr6spp7l
     *
     * @param string $organization
     * @return \KMA\IikoApi\Entity\OrderTypesResponse
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function getOrderTypes(string $organization): OrderTypesResponse
    {
        $endpoint = '/rmsSettings/getOrderTypes';

        $params = [
            'access_token' => $this->token(),
            'organization' => $organization,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->map(
            $json, new OrderTypesResponse
        );
    }
}
