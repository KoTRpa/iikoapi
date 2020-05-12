<?php


namespace KMA\IikoApi\Entity;

/* TODO: make all fields */
class OrderInfo extends Base
{

    /**
     * Guid Идентификатор заказа
     */
    public string $orderId;

    /**
     * Guid Идентификатор заказчика
     */
    public ?string $customerId = null;

    /**
     * Клиент доставки
     */
    public ?Customer $customer = null;

    /**
     * Адрес доставки
     */
    public ?Address $address = null;

    /**
     * Guid Идентификатор ресторана
     */
    public ?string $organization = null;

    /**
     * Сумма заказа
     */
    public ?float $sum = null;

    /**
     * Сумма скидки
     */
    public ?float $discount = null;

    /**
     * Понятный номер заказа
     * Может использоваться для передачи клиенту
     * Уникальность не гарантирована (может быть уникальным в рамках одного обслуживающего сервера)
     */
    public ?string $number = null;

    /**
     * Статус заказа.
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
     * Имя клиента
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

    /**
     * OrderInfo constructor.
     * @param string $orderId
     */
    public function __construct(string $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @param array $data
     * @return OrderInfo
     */
    public static function fromArray(array $data): OrderInfo
    {
        $data = static::clear($data);

        if (!isset($data['orderId'])) {
            throw new \InvalidArgumentException('orderId is undefined');
        }

        $self = new self($data['orderId']);
        unset($data['orderId']);

        foreach ($data as $prop => $value) {
            switch ($prop) {
                case 'customer':
                    $self->customer = Customer::fromArray($value);
                    break;
                case 'address':
                    $self->address = Address::fromArray($value);
                    break;
                default:
                    if (property_exists(self::class, $prop)) {
                        $self->$prop = $value;
                    }
            }
        }

        return $self;
    }
}
