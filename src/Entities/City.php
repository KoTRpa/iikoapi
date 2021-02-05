<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Город
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.gwapcweyfbp6
 */
class City extends Entity
{
    /**
     * @var string GUID Уникальный идентификатор
     */
    public string $id;

    /**
     * @var string Название
     */
    public string $name;

    /**
     * @var string|null Идентификатор города в классификаторе, например, КЛАДР
     */
    public ?string $classifierId = null;

    /**
     * @var string|null Дополнительная информация о городе в свободном формате
     */
    public ?string $additionalInfo = null;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;
}
