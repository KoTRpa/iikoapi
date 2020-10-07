<?php


namespace KMA\IikoApi;

use GuzzleHttp\Promise\PromiseInterface;
use KMA\IikoApi\Traits\Validator;
use Psr\Http\Message\ResponseInterface;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Exceptions\IikoApiException;

/**
 * Handles the response from API.
 */
class IikoResponse
{
    use Traits\Validator;

    /** @var null|int The HTTP status code response from API. */
    protected ?int $httpStatusCode;

    /** @var array The headers returned from API request. */
    protected array $headers;

    /** @var string The raw body of the response from API request. */
    protected string $body;

    /** @var array|string The decoded body of the API response. */
    protected $decodedBody;

    /** @var string API Endpoint used to make the request. */
    protected string $endPoint;

    /** @var IikoRequest The original request that returned this response. */
    protected IikoRequest $request;

    /** @var IikoResponseException The exception thrown by this request. */
    protected IikoResponseException $thrownException;

    /**
     * Gets the relevant data from the Http client.
     *
     * @param IikoRequest                    $request
     * @param ResponseInterface|PromiseInterface $response
     */
    public function __construct(IikoRequest $request, $response)
    {
        if ($response instanceof ResponseInterface) {
            $this->httpStatusCode = $response->getStatusCode();
            $this->body = $response->getBody();
            $this->headers = $response->getHeaders();

            $this->decodeBody();
        } elseif ($response instanceof PromiseInterface) {
            $this->httpStatusCode = null;
        } else {
            throw new \InvalidArgumentException(
                'Second constructor argument "response" must be instance of ResponseInterface or PromiseInterface'
            );
        }

        $this->request = $request;
        $this->endPoint = (string) $request->getEndpoint();
    }

    /**
     * Converts raw API response to proper decoded response.
     */
    public function decodeBody()
    {
        if ($this->isJson($this->body)) {
            $this->decodedBody = json_decode($this->body, true);
        }

        if (null === $this->decodedBody) {
            $this->decodedBody = [];
            parse_str($this->body, $this->decodedBody);
        }

        if ($this->isError()) {
            $this->makeException();
        }
    }

    /**
     * Checks if response is an error.
     *
     * @return bool
     */
    public function isError(): bool
    {
        return ($this->getHttpStatusCode() >= 400 || !$this->isJson($this->body));
    }

    /**
     * Instantiates an exception to be thrown later.
     */
    public function makeException()
    {
        $this->thrownException = new IikoResponseException($this);
    }

    /**
     * Return the original request that returned this response.
     *
     * @return IikoRequest
     */
    public function getRequest(): IikoRequest
    {
        return $this->request;
    }

    /**
     * Gets the HTTP status code.
     * Returns NULL if the request was asynchronous since we are not waiting for the response.
     *
     * @return null|int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Gets the Request Endpoint used to get the response.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endPoint;
    }

    /**
     * Return the access token that was used for this request.
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->request->getAccessToken();
    }

    /**
     * Return the HTTP headers for this response.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Return the raw body response.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Return the decoded body response.
     *
     * @return array|string
     */
    public function getDecodedBody()
    {
        return $this->decodedBody;
    }

    /**
     * Helper function to return the payload of a successful response.
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->decodedBody['result'];
    }

    /**
     * Throws the exception.
     *
     * @throws IikoResponseException
     */
    public function throwException(): IikoResponseException
    {
        throw $this->thrownException;
    }

    /**
     * Returns the exception that was thrown for this request.
     *
     * @return IikoResponseException
     */
    public function getThrownException(): IikoResponseException
    {
        return $this->thrownException;
    }
}
