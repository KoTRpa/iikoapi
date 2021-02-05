<?php


namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Type\DateTime;

/**
 * Class LocationInfo Информация о положении курьера
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.f2gugbpuryn
 */
class LocationInfo extends Entity
{
    /**
     * @var float Широта координаты курьера
     */
    public float $latitude;

    /**
     * @var float Долгота координаты курьера
     */
    public float $longitude;

    /**
     * @var int Точность измерения
     */
    public int $accuracy;

    /**
     * @var DateTime Дата измерения местоположения курьера
     */
    public DateTime $date;
}
