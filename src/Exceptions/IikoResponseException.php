<?php


namespace KMA\IikoApi\Exceptions;


use KMA\IikoApi\IikoResponse;

// @TODO: getters for $innerHttpStatusCode, $innerHttpStatusDesc, $uiMessage
class IikoResponseException extends IikoApiException
{

    /** @var IikoResponse The response that threw the exception. */
    protected IikoResponse $response;

    /** @var array Decoded response. */
    protected array $responseData;

    /** @var string|null description for error from API */
    protected ?string $description = null;

    /** @var int|null httpCode from API body (not response header) */
    protected ?int $innerHttpStatusCode = null;

    /** @var string|null Description for httpCode from body */
    protected ?string $innerHttpStatusDesc = null;

    /** @var string|null optional ui message from iiko */
    protected ?string $uiMessage = null;

    /**
     * @param IikoResponse     $response          The response that threw the exception.
     * @param IikoApiException $previousException The more detailed exception.
     */
    public function __construct(IikoResponse $response, IikoApiException $previousException = null)
    {
        $this->response = $response;
        $this->responseData = $response->getDecodedBody();

        $this->innerHttpStatusCode = $this->responseData['httpStatusCode'] ?? null;

        if ($this->innerHttpStatusCode) {
            $this->innerHttpStatusDesc = $this->getInnerHttpStatusDesc();
        }

        $this->uiMessage = $this->responseData['uiMessage'] ?? null;
        $this->description = $this->responseData['description'] ?? null;

        $errorMessage = $this->getResponseErrorMessage();
        $errorCode = $this->getResponseErrorCode();

        parent::__construct($errorMessage, $errorCode, $previousException);
    }

    /**
     * Returns the HTTP status code.
     *
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->response->getHttpStatusCode();
    }

    /**
     * Returns the raw response used to create the exception.
     *
     * @return string
     */
    public function getRawResponse(): string
    {
        return $this->response->getBody();
    }

    /**
     * Returns the decoded response used to create the exception.
     *
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }

    /**
     * Returns the response entity used to create the exception.
     *
     * @return IikoResponse
     */
    public function getResponse(): IikoResponse
    {
        return $this->response;
    }


    /**
     * Try to extract error message from responseData
     *
     * камень в дупло разработчикав айки,
     * которые не могут привести формат ошибок к единому виду
     *
     * @return string
     */
    protected function getResponseErrorMessage(): string
    {
        return $this->responseData['Message'] ?? ($this->responseData['message'] ?? 'Unknown API error');
    }

    /**
     * Try to extract error code from response
     * default or unknown returns -1
     *
     * some of codes has described in official doc
     * https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.4mg21qeyybfo
     *
     * @return int
     */
    protected function getResponseErrorCode(): int
    {
        return $this->src['code'] ?? -1;
    }

    /**
     * IikoHttpStatus descriptions from doc
     * https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.4mg21qeyybfo
     *
     * @return string
     */
    protected function getInnerHttpStatusDesc(): string
    {
        switch ($this->innerHttpStatusCode) {
            case 400:
                return 'Ошибка в параметрах запроса';
                break;
            case 401:
                return 'Ошибка авторизации';
                break;
            case 403:
                return 'Запрошенная информация недоступна с указанными данными авторизации';
                break;
            case 404:
                return 'Указанный URI или ресурс не существует';
                break;
            case 408:
                return 'Время ожидания для выполнения запроса истекло';
                break;
            case 500:
                return 'Внутренняя ошибка сервера';
                break;
            default:
                return 'Неизвестная ошибка';
        }
    }
}
