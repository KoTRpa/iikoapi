<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Модификатор элемента заказа.
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.8zy928kjgply
 */
class OrderItemModifier extends Entity
{
    /**
     * @var string Guid Идентификатор продукта
     */
    public string $id;

    /**
     * @var string Название продукта
     */
    public string $name;

    /**
     * @var float Количество
     */
    public float $amount;

    /**
     * @var string|null Guid Идентификатор группы в случае группового модификатора.
     * Обязателен если модификатор является групповым.
     */
    public ?string $groupId = null;

    /**
     * @var string|null Имя группы в случае группового модификатора.
     * Обязателен если модификатор является групповым.
     */
    public ?string $groupName = null;
}
