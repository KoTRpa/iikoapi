<?php


namespace KMA\IikoApi;


use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Provider\HttpProvider;
use KMA\IikoApi\Type\TimeSpan;
use function AlibabaCloud\Client\value;

class Api
{
    private string $url;
    private string $user;
    private string $pass;

    private bool $cacheToken;
    private const TOKEN_EXPIRE_TIME = 900;

    public function __construct(string $url, string $user, string $pass, bool $cacheToken = true)
    {
        $this->url = $url;
        $this->user = $user;
        $this->pass = $pass;

        $this->cacheToken = $cacheToken;
    }

    public function orderAdd(OrderRequest $orderRequest, ?TimeSpan $timeout = null): OrderInfo
    {
        $token = $this->token();

        $http = new HttpProvider();

        $url = $this->url . '/orders/add?access_token=' . $token;

        if ($timeout) {
            $url .= '&' . (string)$timeout;
        }

        $data = ['body' => \GuzzleHttp\json_encode($orderRequest, JSON_UNESCAPED_UNICODE)];

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $http->post($url, $data);

        $statusCode = $response->getStatusCode();

        /* guzzle json_decode thrown an exception on decode error */
        $body = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        if ($statusCode >= 400 || empty($body)) {
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($body);
        }

        return OrderInfo::fromArray($body);
    }

    /**
     * @return string
     * @throws IikoResponseException
     */
    private function token(): string
    {
        $token = $this->cacheToken ? get_transient('iiko_token') : null;

        if ($token) {
            return $token;
        }

        $http = new HttpProvider();

        $url = $this->url . '/auth/access_token';
        $query = ['user_id' => $this->user, 'user_secret' => $this->pass];

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $http->get($url, $query);

        $statusCode = $response->getStatusCode();

        /* guzzle json_decode thrown an exception on decode error */
        $body = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        if ($statusCode >= 400 || empty($body)) {
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($body);
        }

        if ($this->cacheToken) {
            set_transient('iiko_token', $response, self::TOKEN_EXPIRE_TIME); // 15min to store token by default
        }

        return $body;
    }
}
