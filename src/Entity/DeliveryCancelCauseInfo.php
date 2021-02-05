<?php


namespace KMA\IikoApi\Entity;

/**
 * Class DeliveryCancelCauseInfo
 * @package KMA\IikoApi\Entity
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
