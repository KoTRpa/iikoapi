<?php

namespace KMA\IikoApi\Entity;

class OrderItem extends Base
{
    /**
     * Guid Идентификатор продукта
     */
    public ?string $id = null;

    /**
     * Артикул товара
     * - required
     */
    public string $code;

    /**
     * Название продукта
     */
    public ?string $name = null;

    /**
     * Количество
     * - max 1000
     */
    public float $amount;

    /**
     * Стоимость
     *  - Обязательно при расчете скидок и бонусов
     */
    public ?float $sum = null;

    /**
     * Категория товара
     *  - Обязательно при расчете скидок и бонусов
     */
    public ?string $category = null;

    /**
     * Модификаторы
     * OrderItemModifier[]
     * TODO: make OrderItemModifierCollection
     */
    public ?array $modifiers = null;

    /**
     * Комментарий
     *  - maxlength 255
     */
    public ?string $comment = null;

    /**
     * Guid Идентификатор гостя
     */
    public ?string $guestId = null;

    /**
     * Информация о комбо-блюде, если позиция в заказе относится к комбо.
     * TODO: make ComboItemInformation
     */
    public ?array $comboInformation = null;


    /**
     * @param string $code
     * @param float $amount
     */
    public function __construct(string $code, float $amount)
    {
        $this->code = $code;
        $this->amount = $amount;
    }
}
