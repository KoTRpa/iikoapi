<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * OrderRequest
 * @url https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.vw4ejhcm2zu9
 */
class OrderRequest extends Entity
{
    /**
     * @var string Идентификатор ресторана.
     * Список доступных ресторанов можно получить при помощи функции "Получение списка организаций"
     */
    public string $organization;

    /**
     * @var string|null Guid Идентификатор доставочного термина, на который нужно отправить заказ.
     * Используется ТОЛЬКО в том случае когда не активирована функция автораспределния заказов
     * и когда нет (физически) операторов коллцентра, которые могут обработать заказ.
     */
    public ?string $deliveryTerminalId = null;

    /**
     * @var \KMA\IikoApi\Entities\Customer Заказчик
     */
    public Customer $customer;

    /**
     * @var \KMA\IikoApi\Entities\Order Заказ
     */
    public Order $order;

    /**
     * @var string|null Номер купона, который применяется к заказу
     */
    public ?string $coupon = null;

    /**
     * @var array|null Guid[] Массив идентификаторов применяемых акций, содержащих Действия оплаты.
     * Если действия оплаты не используются, то массив должен быть пустым.
     */
    public ?array $availablePaymentMarketingCampaignIds = null;

    /**
     * @var array|null Guid[] Массив идентификаторов ручных условий, которые применяются к заказу.
     * !!! Примечание:
     * Для версии РМС более ранней чем  6.2, ручные условия можно применить для CalculateCheckinResult,
     * но при создании заказа они работать не будут.
     * Данная доработка появится в будущих версиях.
     */
    public ?array $applicableManualConditions = null;

    /**
     * @var string|null Служебная информация. Только хранится, доступна через API, на UI не выводится
     */
    public ?string $customData = null;

    /**
     * @var string|null Email для отправки информации о заказе при проблемах с созданием.
     */
    public ?string $emailForFailedOrderInfo = null;

    /**
     * @var string|null Идентификатор рекомендателя (customer.id) из iikoCard.
     * Получить можно из iikoCardAPI методами "get_customer_by_phone" или "get_customer_by_card"
     */
    public ?string $referrerId = null;
}
