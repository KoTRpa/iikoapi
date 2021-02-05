<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entities\City;
use KMA\IikoApi\Entities\CityWithStreets;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * Cities
 * @package KMA\IikoApi\Api
 * @version 1.0.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Cities
{
    /**
     * Города с улицами
     * Метод возвращает список всех городов и улиц каждого из городов. Эти данные могут быть использовать для задания адреса доставки.
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.qyzl28mgceph
     *
     * @param string $orgId iiko organization id
     * @return CityWithStreets[]
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function cities(string $orgId): array
    {
        $endpoint = '/cities/cities';

        $params = [
            'access_token' => $this->token(),
            'organization' => $orgId,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json, [], CityWithStreets::class
        );
    }

    /**
     * Список город (без улиц)
     * Метод возвращает список всех городов заданной организации. Эти данные могут быть использовать для задания адреса доставки.
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.c48svjxtxdwu
     *
     * @param string $orgId iiko organization id
     * @return City[]
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function citiesList(string $orgId): array
    {
        $endpoint = '/cities/citiesList';

        $params = [
            'access_token' => $this->token(),
            'organization' => $orgId,
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json, [], City::class
        );
    }
}
