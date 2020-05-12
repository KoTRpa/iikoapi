<?php


namespace KMA\IikoApi\Collection;


use KMA\IikoApi\Entity\OrderItemModifier;

class OrderItemModifierCollection extends BaseCollection
{
    /**
     * type check before add to collection
     * @param OrderItemModifier $item
     */
    public function validate($item): void
    {
        if (get_class($item) !== OrderItemModifier::class) {
            throw new \InvalidArgumentException(get_class($item) . ' are not ' . OrderItemModifier::class);
        }
    }
}
