<?php


namespace KMA\IikoApi\Entity\Request;

/**
 * Запрос на добавление проблемы к доставочному заказу.
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.coq3d1b0r56h
 * @package KMA\IikoApi\Entity\Request
 */
class AddOrderProblemRequest extends \KMA\IikoApi\Entity\Base
{
    /**
     * @var string Guid Id доставочного заказа
     */
    public string $orderId;

    /**
     * @var string Текст проблемы.
     */
    public string $problemText;
}
