<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Улица
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.y928h39k1gi9
 */
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
