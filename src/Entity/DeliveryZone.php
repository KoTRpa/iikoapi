<?php


namespace KMA\IikoApi\Entity;

/**
 * Зона доставки задается в виде многоугольника с географическими координатами.
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.kqlqeuplctnl
 */
class DeliveryZone extends Base
{
    /** @var string Наименование зоны доставки */
    public string $name;

    /** @var \KMA\IikoApi\Entity\CoordinatesInfo[] Координаты вершин многоугольника */
    public array $coordinates;
}
