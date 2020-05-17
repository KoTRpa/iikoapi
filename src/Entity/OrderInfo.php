<?php


namespace KMA\IikoApi\Entity;

/* TODO: make all fields */
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
     * Причина отмены доставки
     */
    // public ?DeliveryCancelCauseInfo $deliveryCancelCause = null;

    /**
     * Комментарий к отмене доставки
     */
    // public ?string $deliveryCancelComment = null;

    /**
     * Информация о курьере заказа
     */
    // public ?OrderCourierInfo $courierInfo = null;

    /**
     * Координаты адреса доставочного заказа
     */
    // public ?CoordinatesInfo $orderLocationInfo = null;
}
