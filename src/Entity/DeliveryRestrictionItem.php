<?php


namespace KMA\IikoApi\Entity;

/**
 * Элемент ограничения работы ресторана. Связывает между собой ресторан и зону обслуживания.
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.hp2sqg7xcmx
 */
class DeliveryRestrictionItem extends Base
{
    /** @var string Ресторан, к которому применяется заданное ограничение */
    public string $organizationId;

    /** @var string|null Доставочный терминал, к которому применяется заданное ограничение. Null, если доставка одноресторанная */
    public ?string $deliveryTerminalId = null;

    /** @var float|null Минимальная сумма заказа */
    public ?float $minSum = null;

    /** @var string|null Наименование зоны доставки */
    public ?string $zone = null;

    /** @var int Битовый массив, описывающий дни недели, к которым применяется заданное ограничение */
    public int $weekMap;

    /** @var int|null Начало интервала работы ресторана, в минутах от начала дня */
    public ?int $from = null;

    /** @var int|null Конец интервала работы ресторана, в минутах от начала дня. Если to < from, то это означает, что конец рабочего дня залезает на следующий день. */
    public ?int $to = null;

    /** @var int Приоритет ресторана над зоной доставки */
    public int $priority;

    /** @var int Время доставки ресторана в указанную зону */
    public int $deliveryDurationInMinutes;
}
