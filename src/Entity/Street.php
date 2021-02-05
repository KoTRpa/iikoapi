<?php

namespace KMA\IikoApi\Entity;

class Street extends Entity
{
    /**
     * @var string Уникальный идентификатор
     */
    public string $id;

    /**
     * @var string Наименование улицы
     */
    public string $name;

    /**
     * @var string|null Guid Идентификатор города
     */
    public ?string $cityId = null;

    /**
     * @var string|null Идентификатор улицы в классификаторе, например, КЛАДР
     */
    public ?string $classifierId = null;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;
}
