<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Entity\Type\TimeSpan;

class OrderApi extends Api
{
    /**
     * @param OrderRequest $orderRequest
     * @param TimeSpan|null $timeout
     * @return OrderInfo
     * @throws IikoResponseException
     * @throws \JsonMapper_Exception
     */
    public function add(OrderRequest $orderRequest, ?TimeSpan $timeout = null): OrderInfo
    {
        if (null === $timeout) {
            $timeout = new TimeSpan(0, 1, 0);
        }

        $url = $this->url . '/orders/add?access_token=' . $this->token . '&requestTimeout=' . (string)$timeout;

        $query = [
            'body' => \GuzzleHttp\json_encode($orderRequest, JSON_UNESCAPED_UNICODE)
        ];

        $response = $this->remote->post($url, $query);

        return $this->mapper->map($response, new OrderInfo());
    }
}
