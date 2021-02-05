<?php


namespace KMA\IikoApi\Entities\Request;

/**
 * Class SetOrderDeliveredRequest
 * @package KMA\IikoApi\Entities\Request
 * Запрос для изменения статуса заказа курьером, отмечающий его как доставленный или “не доставленный”.
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.ycf8be7klmf7
 */
class SetOrderDeliveredRequest extends \KMA\IikoApi\Entities\Entity
{

    /**
     * @var string Guid Id курьера
     */
    public string $courierId;

    /**
     * @var string Guid Id заказа.
     */
    public string $orderId;

    /**
     * @var bool Флаг доставлен/не доставлен. true - запрос переводит заказ из On way в delivered, false - в обратную сторону.
     */
    public bool $delivered = true;

    /**
     * @var string|null
     * Фактическое время доставки
     * в формате Y-m-d H:i:s
     */
    public ?string $actualDeliveryTime = null;
}
