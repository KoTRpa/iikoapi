<?php
/**
 * Class Nomenclature
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.df9hdpryg7ga
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class Nomenclature extends Entity
{
    /**
     * @var \KMA\IikoApi\Entity\Group[] Группы
     */
    public array $groups;

    /**
     * @var \KMA\IikoApi\Entity\Product[] Продукты
     */
    public array $products;

    /**
     * @var \KMA\IikoApi\Entity\ProductCategory[] Группы продуктов
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
