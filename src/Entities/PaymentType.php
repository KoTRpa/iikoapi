<?php


namespace KMA\IikoApi\Entities;


class PaymentType extends Entity
{
    /**
     * @var string|null Guid Идентификатор типа оплаты
     */
    public ?string $id = null;

    /**
     * @var string|null Код типа оплаты
     */
    public ?string $code = null;

    /**
     * @var string|null Название типа оплаты
     */
    public ?string $name = null;

    /**
     * @var string|null Комментарий к типу оплаты
     */
    public ?string $comment = null;

    /**
     * @var bool|null Признак комбинируемости
     */
    public ?bool $combinable = null;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;

    /**
     * @var bool|null Признак, удален тип оплаты или нет
     */
    public ?bool $deleted = null;

    /**
     * @var array|null Guid[] Массив маркетинговых акций, связанных с типом оплаты iikoCard5, применяемых для данной организации.
     */
    public ?array $applicableMarketingCampaigns = null;
}
