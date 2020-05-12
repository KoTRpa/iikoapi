<?php

namespace KMA\IikoApi\Entity;

class Address extends Base
{
    /**
     * Наименование города
     * - maxlength 255
     */
    public string $city;

    /**
     * Наименование улицы
     * - maxlength 255
     */
    public string $street;

    /**
     * Guid Идентификатор улицы
     * (если справочник улиц синхронизирован с справочником улиц в RMS)
     */
    public ?string $streetId = null;

    /**
     * Идентификатор улицы в классификаторе, например, КЛАДР
     * - maxlength 255
     */
    public ?string $streetClassifierId = null;

    /**
     * Дом
     * - maxlength 10
     */
    public string $home;

    /**
     * Корпус
     * - maxlength 10
     */
    public ?string $housing = null;

    /**
     * Квартира
     * - maxlength 10
     */
    public ?string $apartment = null;

    /**
     * Подъезд
     * - maxlength 10
     */
    public ?string $entrance = null;

    /**
     * Этаж
     * - maxlength 10
     */
    public ?string $floor = null;

    /**
     * Домофон
     * - maxlength 10
     */
    public ?string $doorphone = null;

    /**
     * Дополнительная информация
     * - maxlength 500
     */
    public ?string $comment = null;

    /**
     * Guid Идентификатор района, к которому относится адрес
     */
    public ?string $regionId = null;

    /**
     * Идентификатор адреса во внешней картографической системе
     * - maxlength 255
     */
    public ?string $externalCartographyId = null;

    /**
     * Индекс улицы в адресе, если есть
     * - maxlength 255
     */
    public ?string $index = null;

    public static function fromArray(array $data): Address
    {
        $data = static::clear($data);

        $self = new self();
        foreach ($data as $prop => $value) {
            switch ($prop) {
                default:
                    if (property_exists(self::class, $prop)) {
                        $self->$prop = $value;
                    }
            }
        }
        return $self;
    }
}
