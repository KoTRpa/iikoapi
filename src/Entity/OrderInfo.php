<?php


namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Type\DateTime;

/**
 * Class OrderInfo
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.a9h7fjnc62l1
 */
class OrderInfo extends Base
{

    /**
     * @var string Guid Идентификатор заказа
     */
    public string $orderId;

    /**
     * @var string|null Guid Идентификатор заказчика
     */
    public ?string $customerId = null;

    /**
     * @var Customer|null Клиент доставки
     */
    public ?Customer $customer = null;

    /**
     * @var Address|null Адрес доставки
     */
    public ?Address $address = null;

    /**
     * @var string|null Guid Идентификатор ресторана
     */
    public ?string $organization = null;

    /**
     * @var float|null Сумма заказа
     */
    public ?float $sum = null;

    /**
     * @var float|null Сумма скидки
     */
    public ?float $discount = null;

    /**
     * @var string|null Понятный номер заказа
     * Может использоваться для передачи клиенту
     * Уникальность не гарантирована (может быть уникальным в рамках одного обслуживающего сервера)
     */
    public ?string $number = null;

    /**
     * @var string|null Статус заказа.
     * Варианты значения для доставки (для русской и английской локализации iikoRMS):
     * Русский         | English
     * ------------------------------------
     * Новая           | New
     * Ждет отправки   | Awaiting delivery
     * В пути          | On the way
     * Закрыта         | Closed
     * Отменена        | Cancelled
     * Доставлена      | Delivered
     * Не подтверждена | Not confirmed
     * Готовится       | In progress
     * Готово          | Ready
     */
    public ?string $status = null;

    /**
     * @var string|null Имя клиента
     */
    public ?string $customerName = null;

    /**
     * @var string|null Телефон клиента доставки
     */
    public ?string $customerPhone = null;

    /**
     * @var DeliveryCancelCauseInfo|null Причина отмены доставки
     */
    public ?DeliveryCancelCauseInfo $deliveryCancelCause = null;

    /**
     * @var string|null Комментарий к отмене доставки
     */
    public ?string $deliveryCancelComment = null;

    /**
     * @var OrderCourierInfo|null Информация о курьере заказа
     */
    public ?OrderCourierInfo $courierInfo = null;

    /**
     * @var CoordinatesInfo|null Координаты адреса доставочного заказа
     */
    public ?CoordinatesInfo $orderLocationInfo = null;

    /**
     * @var DateTime|null Дата, к которой нужно доставить заказ
     */
    public ?DateTime $deliveryDate = null;

    /**
     * @var DateTime|null Фактическое время доставки
     */
    public ?DateTime $actualTime = null;

    /**
     * @var DateTime|null Время печати накладной (время пречека)
     */
    public ?DateTime $billTime = null;

    /**
     * @var DateTime|null Время отмены доставки
     */
    public ?DateTime $cancelTime = null;

    /**
     * @var DateTime|null Время закрытия доставки
     */
    public ?DateTime $closeTime = null;

    /**
     * @var DateTime|null Время подтверждения доставки
     */
    public ?DateTime $confirmTime = null;

    /**
     * @var DateTime|null Время создания доставки
     */
    public ?DateTime $createdTime = null;

    /**
     * @var DateTime|null Время сервисной печати
     */
    public ?DateTime $printTime = null;

    /**
     * @var DateTime|null Время отправки доставки
     */
    public ?DateTime $sendTime = null;

    /**
     * @var string|null Комментарий к заказу
     */
    public ?string $comment = null;

    /**
     * @var DeliveryProblemInfo|null Проблема доставки
     */
    public ?DeliveryProblemInfo $problem = null;

    /**
     * @var OrganizationUser|null Оператор, принявший заказ
     */
    public ?OrganizationUser $operator = null;

    /**
     * @var ConceptionInfo|null Концепция
     */
    public ?ConceptionInfo $conception = null;

    /**
     * @var MarketingSourceInfo|null Маркетинговый источник
     */
    public ?MarketingSourceInfo $marketingSource = null;

    /**
     * @var int|null Продолжительность доставки (в минутах)
     */
    public ?int $durationInMinutes = null;

    /**
     * @var int|null Количество гостей
     */
    public ?int $personsCount = null;

    /**
     * @var bool|null Признак того, нужно ли разбивать заказ по гостям
     */
    public ?bool $splitBetweenPersons = null;

    /**
     * @var string|null Примененный к заказу купон
     */
    public ?string $iikoCard5Coupon = null;

    /**
     * @var OrderItem[]|null Позиции заказа
     */
    public ?array $items = null;

    /**
     * @var DeliveryOrderGuest[]|null Гости заказа
     */
    public ?array $guests = null;

    /**
     * @var PaymentItem[]|null Оплаты доставки
     */
    public ?array $payments = null;

    /**
     * @var OrderTypeInfo|null Тип заказа
     */
    public ?OrderTypeInfo $orderType = null;

    /**
     * @var DeliveryTerminalInfo|null Доставочный терминал
     */
    public ?DeliveryTerminalInfo $deliveryTerminal = null;

    /**
     * @var DiscountInfo[]|null Скидки
     */
    public ?array $discounts = null;

    /**
     * @var string|null Служебная информация. Только хранится, доступна через API, на UI не выводится
     */
    public ?string $customData = null;

    /**
     * @var DeliveryOpinion|null Отзывы клиента о заказе
     */
    public ?DeliveryOpinion $opinion = null;
}
