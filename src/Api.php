<?php


namespace KMA\IikoApi;


use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Provider\HttpProvider;
use KMA\IikoApi\Type\TimeSpan;
use Psr\Http\Message\ResponseInterface;

class Api
{
    private string $url;
    private string $user;
    private string $pass;

    /**
     * Api constructor.
     * @throws Exceptions\NotSetConfigProviderException
     */
    public function __construct()
    {
        $config = Config::provider();
        $this->url = $config->url();
        $this->user = $config->user();
        $this->pass = $config->password();
    }

    public static function order()
    {
        return new Api\Order();
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
    protected function token(): string
    {
        $http = new HttpProvider();

        $url = $this->url . '/auth/access_token';
        $query = ['user_id' => $this->user, 'user_secret' => $this->pass];

        $response = $http->get($url, $query);

        return $this->fetch($response);

    }

    /**
     * @param ResponseInterface $response
     * @return string
     * @throws IikoResponseException
     */
    protected function fetch(ResponseInterface $response): string
    {
        $statusCode = $response->getStatusCode();

        $body = $response->getBody()->getContents();
        /* guzzle json_decode thrown an exception on decode error */

        if ($statusCode >= 400 || empty($body)) {
            if (!empty($body)) {
                /* guzzle json_decode also thrown an exception on decode error */
                try {
                    $error = \GuzzleHttp\json_decode($body, true);
                } catch (\Exception $e) {
                    $error = ['message' => 'Ответ содежит невалидный JSON', 'code' => 600, 'httpStatusCode' => $statusCode];
                }
            } else {
                $error = ['message' => 'Пустой ответ', 'code' => 600, 'httpStatusCode' => $statusCode];
            }
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($error);
        }

        return $body;
    }
}
