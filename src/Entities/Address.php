<?php

namespace KMA\IikoApi\Entities;

class Address extends Entity
{
    /**
     * @var string Наименование города
     * - maxlength 255
     */
    public string $city;

    /**
     * @var string Наименование улицы
     * - maxlength 255
     */
    public string $street;

    /**
     * @var string|null Guid Идентификатор улицы
     * (если справочник улиц синхронизирован с справочником улиц в RMS)
     */
    public ?string $streetId = null;

    /**
     * @var string|null Идентификатор улицы в классификаторе, например, КЛАДР
     * - maxlength 255
     */
    public ?string $streetClassifierId = null;

    /**
     * @var string Дом
     * - maxlength 10
     */
    public string $home;

    /**
     * @var string|null Корпус
     * - maxlength 10
     */
    public ?string $housing = null;

    /**
     * @var string|null Квартира
     * - maxlength 10
     */
    public ?string $apartment = null;

    /**
     * @var string|null Подъезд
     * - maxlength 10
     */
    public ?string $entrance = null;

    /**
     * @var string|null Этаж
     * - maxlength 10
     */
    public ?string $floor = null;

    /**
     * @var string|null Домофон
     * - maxlength 10
     */
    public ?string $doorphone = null;

    /**
     * @var string|null Дополнительная информация
     * - maxlength 500
     */
    public ?string $comment = null;

    /**
     * @var string|null Guid Идентификатор района, к которому относится адрес
     */
    public ?string $regionId = null;

    /**
     * @var string|null Идентификатор адреса во внешней картографической системе
     * - maxlength 255
     */
    public ?string $externalCartographyId = null;

    /**
     * @var string|null Индекс улицы в адресе, если есть
     * - maxlength 255
     */
    public ?string $index = null;
}
