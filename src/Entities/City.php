<?php


namespace KMA\IikoApi\Entities;

/**
 * Город
 * @package KMA\IikoApi\Entities
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
