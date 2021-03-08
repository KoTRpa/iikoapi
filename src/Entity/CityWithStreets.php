<?php


namespace KMA\IikoApi\Entity;

/**
 * Город с коллекцией улиц
 * @package KMA\IikoApi\Entity
 */
class CityWithStreets extends Base
{
    /**
     * @var \KMA\IikoApi\Entity\City Ссылка на город
     */
    public City $city;

    /**
     * @var \KMA\IikoApi\Entity\Street[] Коллекция улиц, принадлежащих городу
     */
    public array $streets;
}
