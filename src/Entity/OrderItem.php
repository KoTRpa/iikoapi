<?php

namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Concerns\Hashable;

class OrderItem extends Base
{
    use Hashable;

    protected array $hashFields = [
        'id',
        'amount',
        'sum',
        'modifiers',
    ];

    /**
     * @var string|null Guid Идентификатор продукта
     */
    public ?string $id = null;

    /**
     * @var string|null Артикул товара
     * - required
     */
    public ?string $code = null;

    /**
     * @var string|null Название продукта
     */
    public ?string $name = null;

    /**
     * @var float Количество
     * - max 1000
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
     * @var \KMA\IikoApi\Entity\OrderItemModifier[]|null Модификаторы
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
