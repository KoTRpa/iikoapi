<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Город с коллекцией улиц
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.pmlxy5d13wpp
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
