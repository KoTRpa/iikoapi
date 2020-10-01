<?php


namespace KMA\IikoApi\Entity;

/**
 * Маркетинговый источник
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.utu75qsngtx6
 */
class MarketingSourceInfo extends Base
{
    /**
     * @var string GUID Идентификатор источника
     */
    public string $id;

    /**
     * @var string Наименование источника
     */
    public string $name;

    /**
     * @var string[] Список связанных источников доставки
     */
    public array $attachedSources;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;
}
