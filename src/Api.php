<?php


namespace KMA\IikoApi;

use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Provider\RemoteProvider;
use Psr\Http\Message\ResponseInterface;

class Api
{
    protected string $url;
    protected string $user;
    protected string $pass;

    protected RemoteProvider $remote;
    protected string $token;

    protected string $organizationId;

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

        $this->remote = new RemoteProvider();
        $this->token = $this->token();

    }

    public static function order(): Api\Order
    {
        return new Api\Order();
    }

    public static function organization(): Api\Organization
    {
        return new Api\Organization();
    }

    /**
     * @return string
     * @throws IikoResponseException
     */
    protected function token(): string
    {
        $url = $this->url . '/auth/access_token';
        $query = ['user_id' => $this->user, 'user_secret' => $this->pass];

        $response = $this->remote->get($url, $query);

        return $this->fetch($response);

    }

    /**
     * @param ResponseInterface $response
     * @return string|array
     * @throws IikoResponseException
     */
    protected function fetch(ResponseInterface $response)
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

        return \GuzzleHttp\json_decode($body);
    }
}
