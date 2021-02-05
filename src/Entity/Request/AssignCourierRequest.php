<?php


namespace KMA\IikoApi\Entity\Request;

/**
 * Запрос для задания курьера заказу.
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.ys7y58lhh8mz
 * @package KMA\IikoApi\Entity\Request
 */
class AssignCourierRequest extends \KMA\IikoApi\Entity\Entity
{
    /**
     * @var string Guid курьера
     */
    public string $courierId;

    /**
     * @var string Guid заказа
     */
    public string $orderId;
}
