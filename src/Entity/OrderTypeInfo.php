<?php


namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Concerns\Hashable;

/**
 * Тип заказа
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.h4zflf48j24w
 * iiko dumb devs mistaken in variable names 'Name' instead 'name' and 'OrderServiceType' instead 'orderServiceType'
 */
class OrderTypeInfo extends Base
{
    use Hashable;

    protected array $hashFields = [
        'id',
    ];

    /**
     * @var string GUID Идентификатор типа заказа
     */
    public string $id;

    /**
     * @var string Наименование тапа заказа
     * dev comment: 'тапа' кек)
     */
    public string $name;

    /**
     * @var string Сервисный тип заказа
     */
    public string $orderServiceType;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;
}
