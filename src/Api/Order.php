<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Entity\OrderRequest;

class Order
{
    private const URL = '/orders/add?access_token={accessToken}&request_timeout={requestTimeout}';

    public function __construct(OrderRequest $orderRequest)
    {

    }
}
