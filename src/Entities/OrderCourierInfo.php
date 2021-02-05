<?php


namespace KMA\IikoApi\Entities;

/**
 * Class OrderCourierInfo Информация о курьере заказа
 * @package KMA\IikoApi\Entities
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.fpomjjbi0dh5
 */
class OrderCourierInfo extends Entity
{
    /**
     * @var string GUID Идентификатор курьера
     */
    public string $courierId;

    /**
     * @var LocationInfo|null Информация о положении курьера
     * TODO: по доке поле обязательное, а приходить может и null
     */
    public ?LocationInfo $location = null;
}
