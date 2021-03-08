<?php


namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Concerns\Hashable;

/**
 * Class OrderCourierInfo Информация о курьере заказа
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.fpomjjbi0dh5
 */
class OrderCourierInfo extends Base
{
    use Hashable;

    protected array $hashFields = [
        'courierId',
    ];

    /**
     * @var string GUID Идентификатор курьера
     */
    public string $courierId;

    /**
     * @var \KMA\IikoApi\Entity\LocationInfo|null Информация о положении курьера
     * TODO: по доке поле обязательное, а приходить может и null
     */
    public ?LocationInfo $location = null;
}
