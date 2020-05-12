<?php


namespace KMA\IikoApi\Entity;


class PaymentType extends Base
{
    /**
     * Guid Идентификатор типа оплаты
     */
    public ?string $id = null;

    /**
     * Код типа оплаты
     */
    public ?string $code = null;

    /**
     * Название типа оплаты
     */
    public ?string $name = null;

    /**
     * Комментарий к типу оплаты
     */
    public ?string $comment = null;

    /**
     * Признак комбинируемости
     */
    public ?bool $combinable = null;

    /**
     * Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;

    /**
     * Признак, удален тип оплаты или нет
     */
    public ?bool $deleted = null;

    /**
     * Guid[] Массив маркетинговых акций, связанных с типом оплаты iikoCard5, применяемых для данной организации.
     */
    public ?array $applicableMarketingCampaigns = null;
}
