<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Api;
use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Exceptions\IikoResponseException;

class Order extends Api
{

    public function add(OrderRequest $orderRequest)
    {
        $uri = '/orders/add?access_token={accessToken}&request_timeout={requestTimeout}';
        $token = $this->token();

        $url = $this->url . '/orders/add?access_token=' . $token;

        if ($timeout) {
            $url .= '&' . (string)$timeout;
        }

        $data = ['body' => \GuzzleHttp\json_encode($orderRequest, JSON_UNESCAPED_UNICODE)];

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->remote->post($url, $data);

        $statusCode = $response->getStatusCode();

        /* guzzle json_decode thrown an exception on decode error */
        $body = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        if ($statusCode >= 400 || empty($body)) {
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($body);
        }

        return OrderInfo::fromArray($body);
    }
}
