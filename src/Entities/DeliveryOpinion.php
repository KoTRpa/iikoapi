<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Оценки доставки клиентом
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.uio23wd38xkh
 */
class DeliveryOpinion extends Entity
{
    /**
     * @var string|null GUID Идентификатор организации
     */
    public ?string $organization = null;

    /**
     * @var string GUID Идентификатор доставочного заказа
     */
    public string $deliveryId;

    /**
     * @var string|null Текстовый отзыв клиента о доставке
     */
    public ?string $comment = null;

    /**
     * @var DeliveryOpinionMark[]|null Оценки клиента
     */
    public ?array $marks = null;

}
