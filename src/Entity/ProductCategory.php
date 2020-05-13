<?php
/**
 * Class ProductCategory
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.y928h39k1gi9
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class ProductCategory extends Base
{
    /**
     * @var string|null Guid Уникальный идентификатор
     */
    public ?string $id = null;

    /**
     * @var string|null Название
     */
    public ?string $name = null;
}
