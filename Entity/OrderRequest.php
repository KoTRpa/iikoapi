<?php
/**
 * Class OrderRequest
 * @package KMA\IikoApi\Entity
 * @url https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.vw4ejhcm2zu9\
 */

namespace KMA\IikoApi\Entity;

class OrderRequest extends Base
{
    /**
     * Идентификатор ресторана.
     * Список доступных ресторанов можно получить при помощи функции "Получение списка организаций"
     */
    public string $organization;

    /**
     * Guid
     * Идентификатор доставочного термина, на который нужно отправить заказ.
     * Используется ТОЛЬКО в том случае когда не активирована функция автораспределния заказов
     * и когда нет (физически) операторов коллцентра, которые могут обработать заказ.
     */
    public ?string $deliveryTerminalId = null;

    /**
     * Заказчик
     */
    public ?Customer $customer = null;

    /**
     * Заказ
     */
    public Order $order;

    /**
     * Номер купона, который применяется к заказу
     */
    public ?string $coupon = null;

    /**
     * Guid[]
     * Массив идентификаторов применяемых акций, содержащих Действия оплаты.
     * Если действия оплаты не используются, то массив должен быть пустым.
     */
    public ?array $availablePaymentMarketingCampaignIds = null;

    /**
     * Guid[]
     * Массив идентификаторов ручных условий, которые применяются к заказу.
     * !!! Примечание:
     * Для версии РМС более ранней чем  6.2, ручные условия можно применить для CalculateCheckinResult,
     * но при создании заказа они работать не будут.
     * Данная доработка появится в будущих версиях.
     */
    public ?array $applicableManualConditions = null;

    /**
     * Служебная информация. Только хранится, доступна через API, на UI не выводится
     */
    public ?string $customData = null;

    /**
     * Email для отправки информации о заказе при проблемах с созданием.
     */
    public ?string $emailForFailedOrderInfo = null;

    /**
     * Идентификатор рекомендателя (customer.id) из iikoCard.
     * Получить можно из iikoCardAPI методами "get_customer_by_phone" или "get_customer_by_card"
     */
    public ?string $referrerId = null;

    /**
     * OrderRequest constructor.
     * @param string $organization
     * @param Order $order
     */
    public function __construct(string $organization, Order $order)
    {
        $this->organization = $organization;
        $this->order = $order;
    }
}
