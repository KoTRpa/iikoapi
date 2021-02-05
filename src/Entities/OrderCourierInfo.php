<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Информация о курьере заказа
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.fpomjjbi0dh5
 */
class OrderCourierInfo extends Entity
{
    /**
     * @var string GUID Идентификатор курьера
     */
    public string $courierId;

    /**
     * @var \KMA\IikoApi\Entities\LocationInfo|null Информация о положении курьера
     */
    public ?LocationInfo $location = null;
}
