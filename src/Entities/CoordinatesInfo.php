<?php


namespace KMA\IikoApi\Entities;

/**
 * Координаты адреса доставочного заказа
 * @package KMA\IikoApi\Entities
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
