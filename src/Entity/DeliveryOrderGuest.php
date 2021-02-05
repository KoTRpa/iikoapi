<?php


namespace KMA\IikoApi\Entity;

/**
 * Гость
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.swxkcwxen9vh
 */
class DeliveryOrderGuest extends Entity
{
    /**
     * @var string GUID Идентификатор гостя
     */
    public string $id;

    /**
     * @var string Имя гостя
     */
    public string $name;
}
