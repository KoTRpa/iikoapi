<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Причина отмены доставки
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.y3w002234z7e
 */
class DeliveryCancelCauseInfo extends Entity
{

    /**
     * @var string GUID Идентификатор причины отмены доставки
     */
    public string $id;

    /**
     * @var string Строковое описание причины отмены доставки
     */
    public string $name;
}
