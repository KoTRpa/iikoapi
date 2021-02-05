<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Элемент заказа
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.hmdgnvvxsxzp
 */
class OrderItem extends Entity
{
    /**
     * @var string|null Guid Идентификатор продукта
     */
    public ?string $id = null;

    /**
     * @var string|null Артикул товара
     */
    public ?string $code = null;

    /**
     * @var string|null Название продукта
     */
    public ?string $name = null;

    /**
     * @var float Количество
     */
    public float $amount;

    /**
     * @var float|null Стоимость
     *  - Обязательно при расчете скидок и бонусов
     */
    public ?float $sum = null;

    /**
     * @var string|null Категория товара
     *  - Обязательно при расчете скидок и бонусов
     */
    public ?string $category = null;

    /**
     * @var \KMA\IikoApi\Entities\OrderItemModifier[]|null Модификаторы
     */
    public ?array $modifiers = null;

    /**
     * @var string|null Комментарий
     *  - maxlength 255
     */
    public ?string $comment = null;

    /**
     * @var string|null Guid Идентификатор гостя
     */
    public ?string $guestId = null;

    /**
     * @var array|null Информация о комбо-блюде, если позиция в заказе относится к комбо
     */
    public ?array $comboInformation = null;
}
