<?php


namespace KMA\IikoApi\Entity;

/**
 * Информация по скидкам
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.vqohcw8yj9s8
 */
class DiscountInfo extends Base
{
    /**
     * @var string GUID Идентификатор скидки
     */
    public string $discountCardTypeId;

    /**
     * @var string|null Трек скидочной карты
     */
    public ?string $discountCardSlip = null;

    /**
     * @var float Сумма скидки
     */
    public float $discountOrIncreaseSum;
}
