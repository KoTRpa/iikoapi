<?php


namespace KMA\IikoApi\Entity;

/**
 * Город с коллекцией улиц
 * @package KMA\IikoApi\Entity
 */
class CityWithStreets extends Entity
{
    /**
     * @var City Ссылка на город
     */
    public City $city;

    /**
     * @var Street[] Коллекция улиц, принадлежащих городу
     */
    public array $streets;
}
