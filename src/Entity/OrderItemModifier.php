<?php


namespace KMA\IikoApi\Entity;


class OrderItemModifier extends Entity
{
    /**
     * @var string Guid Идентификатор продукта
     *  - required
     */
    public string $id;

    /**
     * @var string Название продукта
     *  - required
     */
    public string $name;

    /**
     * @var float Количество
     *  - required
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
