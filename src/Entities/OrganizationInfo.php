<?php
/**
 * Class OrganizationInfo
 * @package KMA\IikoApi\Entities
 * @see https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.oukh8de96nr1
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entities;

class OrganizationInfo extends Entity
{

    /**
     * @var string Guid Идентификатор организации
     */
    public string $id;

    /**
     * @var string Название организации(не юр. лицо)
     */
    public string $name;

    /**
     * @var string|null Описание организации данное владельцем
     */
    public ?string $description = null;

    /**
     * @var string|null Ссылка на изображение с логотипом организации
     */
    public ?string $logo = null;

    /**
     * @var ContactInfo|null Контактная информация в свободной форме.
     */
    public ?ContactInfo $contact = null;

    /**
     * @var string|null Домашняя страница
     */
    public ?string $homePage = null;

    /**
     * @var string|null Адрес
     */
    public ?string $address = null;

    /**
     * @var bool|null Активна
     */
    public ?bool $isActive = null;

    /**
     * @var float|null Географическая долгота
     */
    public ?float $longitude = null;

    /**
     * @var float|null Географическая широта
     */
    public ?float $latitude = null;

    /**
     * @var string|null Guid? Идентификатор сети, если организация входит в сеть
     */
    public ?string $networkId = null;

    /**
     * @var string|null Логотип организации, если есть
     */
    public ?string $logoImage = null;

    /**
     * @var string|null Номер телефона
     */
    public ?string $phone = null;

    /**
     * @var string|null Веб сайт
     */
    public ?string $website = null;

    /**
     * @var string|null Средний чек
     */
    public ?string $averageCheque = null;

    /**
     * @var string|null время работы
     * представляет собой строку состоящую из записей начало работы-окончание работы, разделённую ;
     * Выходной обозначается 00:00-00:00
     * работа 24 часа 00:00-24:00
     * Дни недели считаются с понедельника. Пример:
     * 10:30-18:00;00:00-24:00;00:00-00:00;19:00-04:00;;;10:00-20:00
     */
    public ?string $workTime = null;

    /**
     * @var int|null Тип организации
     * Unknown = 0
     * Restaurant = 1
     * Shop = 2
     * TravelAgency = 3
     * BeautySalon = 4
     */
    public ?int $bizOrganizationType = null;

    /**
     * @var string|null Код валюты, используемой в организации
     */
    public ?string $currencyIsoName = null;
}
