<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Api;
use KMA\IikoApi\Entity\OrderRequest;

class Order extends Api
{

    public function add(OrderRequest $orderRequest)
    {
        $uri = '/orders/add?access_token={accessToken}&request_timeout={requestTimeout}';
    }
}
