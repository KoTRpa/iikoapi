<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Координаты адреса доставочного заказа
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.ix4f51hgorhm
 */
class CoordinatesInfo extends Entity
{
    /**
     * @var float Широта
     */
    public float $latitude;

    /**
     * @var float Долгота
     */
    public float $longitude;
}
