<?php

namespace KMA\IikoApi\Entity;

class Order extends Base
{
    /**
     * Идентификатор заказа
     * Guid
     */
    public ?string $id = null;

    /**
     * Идентификатор заказа – должен быть уникальным в рамках данной организации
     */
    public ?string $externalId = null;

    /**
     * Дата выполнения заказа, если задан null,
     * то система подставит время как текущее + продолжительность доставки
     * из “График работы и картография”
     *
     * Валидация:
     *  - required (by can be null x_x)
     *
     * TODO: make DateTime type
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
     * Элементы заказа
     * OrderItem[]
     * TODO: OrderItemCollection
     *
     * - required
     */
    public array $items;

    /**
     * PaymentItem[]
     * Элементы оплаты заказа
     * TODO: PaymentItemCollection
     */
    public ?array $paymentItems = null;

    /**
     * Телефонный номер.
     * Валидация:
     * - regexp ^(8|\+?\d{1,3})?[ -]?\(?(\d{3})\)?[ -]?(\d{3})[ -]?(\d{2})[ -]?(\d{2})$
     * - maxlength 40
     */
    public string $phone;

    /**
     * Имя клиента
     * - maxlength 60
     */
    public ?string $customerName = null;

    /**
     * Признак доставки самовывозом
     */
    public ?bool $isSelfService = null;

    /**
     * Guid
     * Идентификатор типа заказа.
     * Получается методом "Получение списка допустимых типов заказов"
     * https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.v0yylr6spp7l
     */
    public ?string $orderTypeId = null;

    /**
     * Адрес доставки заказа
     */
    public ?Address $address = null;

    /**
     * Комментарий к заказу
     * - maxlength 500
     */
    public ?string $comment = null;

    /**
     * Концепция
     */
    public ?string $conception = null;

    /**
     * Количество персон
     */
    public ?int $personsCount = null;

    /**
     * Сумма заказа
     * - required
     */
    public float $fullSum;

    /**
     * Маркетинговый источник (реклама).
     * Можно указывать не более одного источника.
     * Пример: deliveryMarket.ru
     */
    public ?string $marketingSource = null;

    /**
     * Guid Идентификатор маркетингового источника
     */
    public ?string $marketingSourceId = null;

    /**
     * Guid Идентификатор скидки для заказа.
     * Получается методом "Получить список скидок, доступных для применения в доставке для заданного ресторана"
     * https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.mhkq80x5r96u
     */
    public ?string $discountCardTypeId = null;

    /**
     * Трек скидочной карты, которую надо применить к заказу.
     * Если указан одновременно с discountCardTypeId,
     * то будет применятся скидка по discountCardTypeId.
     */
    public ?string $discountCardSlip = null;

    /**
     * Сумма скидки.
     * Необходима только для скидок со свободной суммой.
     */
    public ?float $discountOrIncreaseSum = null;

    /**
     * Массив комбо-блюд, включенных в заказ.
     * DeliveryOrderCombo[]
     * TODO: make DeliveryOrderCombo and DeliveryOrderComboCollection
     */
    public ?array $orderCombos = null;


    /**
     * Order constructor.
     * @param string $date
     * @param array $items
     * @param string $phone
     * @param float $fullSum
     */
    public function __construct(string $date, array $items, string $phone, float $fullSum)
    {
        $this->date = $date;
        $this->items = $items;
        $this->phone = $phone;
        $this->fullSum = $fullSum;
    }
}
