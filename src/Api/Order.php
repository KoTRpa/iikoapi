<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Entity\Type\TimeSpan;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * Order Api
 * @package KMA\IikoApi\Api
 * @version 0.1.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Order
{
    /**
     * @param OrderRequest $orderRequest
     * @param TimeSpan|null $timeout
     * @return OrderInfo
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function orderAdd(OrderRequest $orderRequest, ?TimeSpan $timeout = null): OrderInfo
    {
        if (null === $timeout) {
            $timeout = new TimeSpan(0, 1, 0);
        }

        // for unknown reasons iiko requires get params in post request >_<
        $endpoint = sprintf(
            '/orders/add?access_token=%s&requestTimeout=%s',
            $this->token(),
            (string)$timeout
        );

        $params = ['json' => $orderRequest];

        $response = $this->post($endpoint, $params);
        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->map(
            $json, new OrderInfo()
        );
    }
}
