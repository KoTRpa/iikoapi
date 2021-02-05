<?php


namespace KMA\IikoApi\Entities;

/**
 * Город с коллекцией улиц
 * @package KMA\IikoApi\Entities
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
