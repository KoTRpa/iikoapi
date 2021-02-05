<?php

namespace KMA\IikoApi\Entities\Request;

use KMA\IikoApi\Entity;

/**
 * Запрос для задания курьера заказу.
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.ys7y58lhh8mz
 */
class AssignCourierRequest extends Entity
{
    /**
     * @var string Guid курьера
     */
    public string $courierId;

    /**
     * @var string Guid заказа
     */
    public string $orderId;
}
