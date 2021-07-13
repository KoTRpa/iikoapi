<?php


namespace KMA\IikoApi\Entity;


/**
 * Ограничения работы ресторана
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.n2tt466ps9a
 */
class DeliveryRestrictions extends Base
{
    /** @var string|null Ссылка на карту регионов обслуживания доставки */
    public ?string $deliveryRegionsMapUrl = null;

    /** @var int|null Общая продолжительность доставки */
    public ?int $defaultDeliveryDurationInMinutes = null;

    /** @var int|null ??? */
    public ?int $defaultSelfServiceDurationInMinutes = null;

    /** @var bool Признак того, что ресторан(ы)  используют общие ограничения по времени доставки */
    public bool $useSameDeliveryDuration;

    /** @var bool Признак того, что ресторан(ы) по всем зонам используют одинаковую минимальную сумму */
    public bool $useSameMinSum;

    /** @var float|null Общая минимальная сумма заказа */
    public ?float $defaultMinSum = null;

    /** @var bool Признак того что ресторан(ы) использует общий интервал работы для всех зон. */
    public bool $useSameWorkTimeInterval;

    /** @var int|null Начало интервала по умолчанию работы ресторана, в минутах от начала дня. Используется совместно с useSameWorkTimeInterval */
    public ?int $defaultFrom = null;

    /** @var int|null Конец интервала по умолчанию работы ресторана, в минутах от начала дня. Если defaultTo < defaultFrom, то это означает, что конец рабочего дня залезает на следующий день. Используется совместно с useSameWorkTimeInterval */
    public ?int $defaultTo = null;

    /** @var bool Признак того, что ограничения работы точек распространяются на все дни недели. */
    public bool $useSameRestrictionsOnAllWeek;

    /** @var \KMA\IikoApi\Entity\DeliveryRestrictionItem[]|null Привязки ресторанов к зонам доставки */
    public ?array $restrictions = null;

    /** @var \KMA\IikoApi\Entity\DeliveryZone[]|null Список доставочных зон из Яндекс.Карт */
    public ?array $deliveryZones = null;
}
