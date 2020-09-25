<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\Enum\DeliveryStatus;
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

    /**
     * alias for deliveryOrders (syntax sugar)
     *
     * @throws IikoApiException|\JsonMapper_Exception
     * @param string $organization
     * @param string $dateFrom format yyyy-mm-dd
     * @param string $dateTo format yyyy-mm-dd
     * @param DeliveryStatus|null $deliveryStatus (optional)
     * @param string|null $deliveryTerminalId (optional)
     * @param TimeSpan|null $requestTimeout (optional) default 30sec
     * @return OrderInfo[]
     */
    public function orders(
        string $organization,
        string $dateFrom,
        string $dateTo,
        ?DeliveryStatus $deliveryStatus = null,
        ?string $deliveryTerminalId = null,
        ?TimeSpan $requestTimeout = null
    ): array
    {
        return $this->deliveryOrders(
            $organization,
            $dateFrom,
            $dateTo,
            $deliveryStatus,
            $deliveryTerminalId,
            $requestTimeout
        );
    }

    /**
     * Список доставок в указанном интервале времени
     * https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.wxeb83nrwf4f
     *
     * @throws IikoApiException|\JsonMapper_Exception
     * @param string $organization
     * @param string $dateFrom format yyyy-mm-dd
     * @param string $dateTo format yyyy-mm-dd
     * @param DeliveryStatus|null $deliveryStatus (optional)
     * @param string|null $deliveryTerminalId (optional)
     * @param TimeSpan|null $requestTimeout (optional) default 30sec
     * @return OrderInfo[]
     */
    public function deliveryOrders(
        string $organization,
        string $dateFrom,
        string $dateTo,
        ?DeliveryStatus $deliveryStatus = null,
        ?string $deliveryTerminalId = null,
        ?TimeSpan $requestTimeout = null
    ): array
    {
        if (null === $requestTimeout) {
            $requestTimeout = new TimeSpan(0, 0, 30);
        }

        $endpoint = '/orders/deliveryOrders';

        $query = [
            'access_token' => $this->token(),
            'organization' => $organization,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'request_timeout' => $requestTimeout
        ];

        if (null !== $deliveryStatus) {
            $query['deliveryStatus'] = $deliveryStatus;
        }

        if (null !== $deliveryTerminalId) {
            $query['deliveryTerminalId'] = $deliveryTerminalId;
        }

        $response = $this->get($endpoint, $query);
        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        $json = $json->deliveryOrders;

        return (new JsonMapper())->mapArray(
            $json, [], OrderInfo::class
        );
    }

    /**
     * Получение информации о предварительно созданном заказе.
     *
     * @param string $organization
     * @param string $orderId
     * @param TimeSpan|null $requestTimeout
     * @return OrderInfo
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function orderInfo(string $organization, string $orderId, ?TimeSpan $requestTimeout = null): OrderInfo
    {
        if (null === $requestTimeout) {
            $requestTimeout = new TimeSpan(0, 0, 30);
        }

        $endpoint = '/orders/info';

        $query = [
            'access_token' => $this->token(),
            'organization' => $organization,
            'order' => $orderId,
            'request_timeout' => $requestTimeout
        ];

        $response = $this->get($endpoint, $query);
        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->map(
            $json, new OrderInfo
        );
    }
}
