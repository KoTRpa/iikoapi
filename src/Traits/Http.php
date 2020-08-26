<?php


namespace KMA\IikoApi\Traits;

use KMA\IikoApi\Exceptions\IikoApiException;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\HttpClients\IHttpClient;
use KMA\IikoApi\IikoClient;
use KMA\IikoApi\IikoRequest;
use KMA\IikoApi\IikoResponse;


trait Http
{
    use Validator;

    /** @var string|null Iiko API Access Token. */
    protected ?string $accessToken = null;

    /** @var IikoClient|null The Iiko API client service. */
    protected ?IikoClient $client = null;

    /** @var IHttpClient|null Http Client Handler */
    protected ?IHttpClient $httpClientHandler = null;

    /** @var bool Indicates if the request to will be asynchronous (non-blocking). */
    protected bool $isAsyncRequest = false;

    /** @var int Timeout of the request in seconds. */
    protected int $timeOut = 60;

    /** @var int Connection timeout of the request in seconds. */
    protected int $connectTimeOut = 10;

    /** @var IikoResponse|null Stores the last request made to API. */
    protected ?IikoResponse $lastResponse;

    /**
     * Set Http Client Handler.
     *
     * @param IHttpClient $httpClientHandler
     *
     * @return $this
     */
    public function setHttpClientHandler(IHttpClient $httpClientHandler)
    {
        $this->httpClientHandler = $httpClientHandler;

        return $this;
    }

    /**
     * Returns the IikoClient service.
     *
     * @return IikoClient
     */
    protected function getClient(): IikoClient
    {
        if ($this->client === null) {
            $this->client = new IikoClient(
                $this->getConfig('url'),
                $this->httpClientHandler
            );
        }

        return $this->client;
    }

    /**
     * Returns the last response returned from API request.
     *
     * @return IikoResponse|null
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * Returns API Access Token.
     *
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * Sets the access token to use with API requests.
     *
     * @param string $accessToken The bot access token to save.
     *
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Check if this is an asynchronous request (non-blocking).
     *
     * @return bool
     */
    public function isAsyncRequest(): bool
    {
        return $this->isAsyncRequest;
    }

    /**
     * Make this request asynchronous (non-blocking).
     *
     * @param bool $isAsyncRequest
     *
     * @return $this
     */
    public function setAsyncRequest(bool $isAsyncRequest)
    {
        $this->isAsyncRequest = $isAsyncRequest;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeOut(): int
    {
        return $this->timeOut;
    }

    /**
     * @param int $timeOut
     *
     * @return $this
     */
    public function setTimeOut(int $timeOut)
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnectTimeOut(): int
    {
        return $this->connectTimeOut;
    }

    /**
     * @param int $connectTimeOut
     *
     * @return $this
     */
    public function setConnectTimeOut(int $connectTimeOut)
    {
        $this->connectTimeOut = $connectTimeOut;

        return $this;
    }

    /**
     * Sends a GET request to API and returns the result.
     *
     * @param string $endpoint
     * @param array  $params
     *
     * @throws IikoApiException
     *
     * @return IikoResponse
     */
    protected function get(string $endpoint, array $params = []): IikoResponse
    {
        return $this->sendRequest('GET', $endpoint, $params);
    }

    /**
     * Sends a POST request to API and returns the result.
     *
     * @param string $endpoint
     * @param array  $params
     *
     * @throws IikoResponseException
     * @return IikoResponse
     */
    protected function post(string $endpoint, array $params = []): IikoResponse
    {
        // $params = $this->normalizeParams($params);

        return $this->sendRequest('POST', $endpoint, $params);
    }

    /**
     * Sends a request to API and returns the result.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $params
     *
     * @throws IikoResponseException
     *
     * @return IikoResponse
     */
    protected function sendRequest($method, $endpoint, array $params = []): IikoResponse
    {
        $request = $this->resolveRequest($method, $endpoint, $params);

        return $this->lastResponse = $this->getClient()->sendRequest($request);
    }

    /**
     * Instantiates a new IikoRequest entity.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $params
     *
     * @return IikoRequest
     */
    protected function resolveRequest($method, $endpoint, array $params = []): IikoRequest
    {
        return (new IikoRequest(
            $this->getAccessToken(),
            $method,
            $endpoint,
            $params,
            $this->isAsyncRequest()
        ))
            ->setTimeOut($this->getTimeOut())
            ->setConnectTimeOut($this->getConnectTimeOut());
    }

    /**
     * @param array $params
     *
     * @return array
     */
    private function normalizeParams(array $params)
    {

        return ['form_params' => $params];
    }
}
