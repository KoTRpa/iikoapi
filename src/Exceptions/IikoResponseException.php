<?php


namespace KMA\IikoApi\Exceptions;


use Throwable;

class IikoResponseException extends \Exception
{
    protected $src;
    protected $description = null;
    protected $httpStatusCode = null;
    protected $httpStatusDesc = null;
    protected $uiMessage = null;

    public function __construct($src)
    {
        // TODO: from array and object

        $message = 'Неизвестная ошибка';
        $code = 0;

        $this->src = $src;

        if (is_array($this->src)) {
            /*
             * камень в дупло разработчикав айки,
             * которые не могут привести формат ошибок к единому виду
             */
            if (isset($this->src['Message'])) {
                $this->src['message'] = $this->src['Message'];
            }

            $message = $this->src['message'];

            // few codes has description on official doc
            // https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.4mg21qeyybfo
            $code = $this->src['code'] ?? 0;


            $this->description = $this->src['description'] ?? null;
            $this->httpStatusCode = $this->src['httpStatusCode'] ?? null;
            $this->uiMessage = $this->src['uiMessage'] ?? null;

            switch ($this->httpStatusCode) {
                case 400:
                    $this->httpStatusDesc = 'Ошибка в параметрах запроса';
                    break;
                case 401:
                    $this->httpStatusDesc = 'Ошибка авторизации';
                    break;
                case 403:
                    $this->httpStatusDesc = 'Запрошенная информация недоступна с указанными данными авторизации';
                    break;
                case 404:
                    $this->httpStatusDesc = 'Указанный URI или ресурс не существует';
                    break;
                case 408:
                    $this->httpStatusDesc = 'Время ожидания для выполнения запроса истекло';
                    break;
                case 500:
                    $this->httpStatusDesc = 'Внутренняя ошибка сервера';
                    break;
                default:
                    $this->httpStatusDesc = 'Неизвестная ошибка';
            }
        }

        parent::__construct($message, $code);
    }

    public function getSrc()
    {
        return $this->src;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function httpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function httpStatusDesc()
    {
        return $this->httpStatusDesc;
    }

    public function uiMessage()
    {
        return $this->uiMessage;
    }
}
