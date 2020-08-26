<?php


namespace KMA\IikoApi;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\HttpClients\GuzzleHttpClient;
use KMA\IikoApi\HttpClients\IHttpClient;


final class IikoClient
{
    /** @var string base API URL. */
    protected string $baseUrl;

    /** @var IHttpClient|null HTTP Client. */
    protected $httpClientHandler;

    /**
     * Instantiates a new IikoClient object
     *
     * @param string $baseUrl
     * @param IHttpClient|null $httpClientHandler
     */
    public function __construct(string $baseUrl, IHttpClient $httpClientHandler = null)
    {
        $this->baseUrl = $baseUrl;
        $this->httpClientHandler = $httpClientHandler ?? new GuzzleHttpClient();
    }

    /**
     * Returns the HTTP client handler.
     *
     * @return IHttpClient
     */
    public function getHttpClientHandler(): IHttpClient
    {
        return $this->httpClientHandler;
    }

    /**
     * Sets the HTTP client handler.
     *
     * @param IHttpClient $httpClientHandler
     *
     * @return IikoClient
     */
    public function setHttpClientHandler(IHttpClient $httpClientHandler): IikoClient
    {
        $this->httpClientHandler = $httpClientHandler;
        return $this;
    }

    /**
     * Send an API request and process the result.
     *
     * @param IikoRequest $request
     *
     * @return IikoResponse
     * @throws IikoResponseException
     *
     */
    public function sendRequest(IikoRequest $request): IikoResponse
    {
        [$url, $method, $headers, $isAsyncRequest] = $this->prepareRequest($request);

        $options = $this->getOption($request, $method);

        $rawResponse = $this->getHttpClientHandler()
            ->setTimeOut($request->getTimeOut())
            ->setConnectTimeOut($request->getConnectTimeOut())
            ->send(
                $url,
                $method,
                $headers,
                $options,
                $isAsyncRequest
            );

        $returnResponse = $this->response($request, $rawResponse);

        if ($returnResponse->isError()) {
            throw $returnResponse->getThrownException();
        }

        return $returnResponse;
    }

    /**
     * Prepares the API request for sending to the client handler.
     *
     * @param IikoRequest $request
     *
     * @return array
     */
    public function prepareRequest(IikoRequest $request): array
    {
        $url = $this->getBaseUrl() . '/' . $request->getEndpoint();

        return [
            $url,
            $request->getMethod(),
            $request->getHeaders(),
            $request->isAsyncRequest(),
        ];
    }

    /**
     * Returns the base Bot URL.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Creates response object.
     *
     * @param IikoRequest $request
     * @param ResponseInterface|PromiseInterface $response
     *
     * @return IikoResponse
     */
    protected function response(IikoRequest $request, $response): IikoResponse
    {
        return new IikoResponse($request, $response);
    }

    /**
     * @param IikoRequest $request
     * @param $method
     *
     * @return array
     */
    private function getOption(IikoRequest $request, $method)
    {
        if ($method === 'POST') {
            return $request->getPostParams();
        }

        return ['query' => $request->getParams()];
    }
}
