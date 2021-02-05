<?php
/**
 * Class Nomenclature
 * @package KMA\IikoApi\Entities
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.df9hdpryg7ga
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entities;

class Nomenclature extends Entity
{
    /**
     * @var \KMA\IikoApi\Entities\Group[] Группы
     */
    public array $groups;

    /**
     * @var \KMA\IikoApi\Entities\Product[] Продукты
     */
    public array $products;

    /**
     * @var \KMA\IikoApi\Entities\ProductCategory[] Группы продуктов
     */
    public array $productCategories;

    /**
     * @var int Ревизия (одна на все дерево продуктов)
     */
    public int $revision;

    /**
     * @var string Дата последнего обновления меню в формате "yyyy-MM-dd HH:mm:ss"
     */
    public string $uploadDate;
}
