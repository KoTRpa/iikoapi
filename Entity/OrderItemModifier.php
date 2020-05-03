<?php


namespace KMA\IikoApi\Entity;


class OrderItemModifier extends Base
{
    /**
     * Guid Идентификатор продукта
     *  - required
     */
    public string $id;

    /**
     * Название продукта
     *  - required
     */
    public string $name;

    /**
     * Количество
     *  - required
     */
    public float $amount;

    /**
     * Guid Идентификатор группы в случае группового модификатора.
     * Обязателен если модификатор является групповым.
     */
    public ?string $groupId = null;

    /**
     * Имя группы в случае группового модификатора.
     * Обязателен если модификатор является групповым.
     */
    public ?string $groupName = null;


    /**
     * OrderItemModifier constructor.
     * @param string $id
     * @param string $name
     * @param float $amount
     */
    public function __construct(string $id, string $name, float $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
    }

    // TODO: Check Group modifier
}
