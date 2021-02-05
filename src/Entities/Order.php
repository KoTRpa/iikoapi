<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Заказ
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.i112owb807tz
 */
class Order extends Entity
{
    /**
     * @var string|null Идентификатор заказа
     * Guid
     */
    public ?string $id = null;

    /**
     * @var string|null Идентификатор заказа – должен быть уникальным в рамках данной организации
     */
    public ?string $externalId = null;

    /**
     * @var string Дата выполнения заказа
     * если задан null,
     * то система подставит время как текущее + продолжительность доставки
     * из “График работы и картография”
     *
     * Дата и время.
     * Строка в формате “YYYY-MM-DD hh:mm:ss”, где
     * YYYY - год;
     * MM - месяц (начиная с 1 - январь);
     * DD - день;
     * hh - час (от 00 до 23);
     * mm - минута (от 00 до 59);
     * ss - секунда (от 00 до 59).
     */
    public string $date;

    /**
     * @var \KMA\IikoApi\Entities\OrderItem[] Элементы заказа
     */
    public array $items;

    /**
     * @var \KMA\IikoApi\Entities\PaymentItem[]|null Элементы оплаты заказа
     */
    public ?array $paymentItems = null;

    /**
     * @var string Телефонный номер.
     */
    public string $phone;

    /**
     * @var string|null Имя клиента
     */
    public ?string $customerName = null;

    /**
     * @var bool Признак доставки самовывозом
     */
    public bool $isSelfService = true;

    /**
     * @var string|null Guid Идентификатор типа заказа
     * Получается методом "Получение списка допустимых типов заказов"
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.v0yylr6spp7l
     */
    public ?string $orderTypeId = null;

    /**
     * @var \KMA\IikoApi\Entities\Address|null Адрес доставки заказа
     */
    public ?Address $address = null;

    /**
     * @var string|null Комментарий к заказу
     */
    public ?string $comment = null;

    /**
     * @var string|null Концепция
     */
    public ?string $conception = null;

    /**
     * @var int|null Количество персон
     */
    public ?int $personsCount = null;

    /**
     * @var float Сумма заказа
     */
    public float $fullSum;

    /**
     * @var string|null Маркетинговый источник (реклама).
     * Можно указывать не более одного источника.
     * Пример: deliveryMarket.ru
     */
    public ?string $marketingSource = null;

    /**
     * @var string|null Guid Идентификатор маркетингового источника
     */
    public ?string $marketingSourceId = null;

    /**
     * @var string|null Guid Идентификатор скидки для заказа.
     * Получается методом "Получить список скидок, доступных для применения в доставке для заданного ресторана"
     * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.mhkq80x5r96u
     */
    public ?string $discountCardTypeId = null;

    /**
     * @var string|null Трек скидочной карты, которую надо применить к заказу.
     * Если указан одновременно с discountCardTypeId,
     * то будет применятся скидка по discountCardTypeId.
     */
    public ?string $discountCardSlip = null;

    /**
     * @var float|null Сумма скидки.
     * Необходима только для скидок со свободной суммой.
     */
    public ?float $discountOrIncreaseSum = null;

    /**
     * @var array|null Массив комбо-блюд, включенных в заказ.
     * TODO: make \KMA\IikoApi\Entities\DeliveryOrderCombo
     */
    public ?array $orderCombos = null;
}
