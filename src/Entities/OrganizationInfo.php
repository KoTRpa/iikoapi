<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Описание организации (Ресторан, AЗС, Гостиница, ...) (IikoCard)
 * @see https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.oukh8de96nr1
 *
 * @property string $id Guid Идентификатор организации
 * @property string $name Название организации(не юр. лицо)
 * @property null|string $description Описание организации данное владельцем
 * @property null|string $logo Ссылка на изображение с логотипом организации
 * @property null|\KMA\IikoApi\Entities\ContactInfo $contact Контактная информация в свободной форме.
 * @property null|string $homePage Домашняя страница
 * @property null|string $address Адрес
 * @property null|bool $isActive Активна
 * @property null|float $longitude Географическая долгота
 * @property null|float $latitude Географическая широта
 * @property null|string $networkId Guid Идентификатор сети, если организация входит в сеть
 * @property null|string $logoImage Логотип организации, если есть
 * @property null|string $phone Номер телефона
 * @property null|string $website Веб-сайт
 * @property null|string $averageCheque Средний чек
 * @property null|string $workTime время работы
 * \ представляет собой строку состоящую из записей начало работы-окончание работы, разделённую ";"
 * \ Выходной обозначается 00:00-00:00
 * \ работа 24 часа 00:00-24:00
 * \ Дни недели считаются с понедельника.
 * \ Пример: 10:30-18:00;00:00-24:00;00:00-00:00;19:00-04:00;;;10:00-20:00
 * @property null|int $bizOrganizationType Тип организации
 * \ Unknown = 0
 * \ Restaurant = 1
 * \ Shop = 2
 * \ TravelAgency = 3
 * \ BeautySalon = 4
 * @property null|string $currencyIsoName Код валюты, используемой в организации
 */
class OrganizationInfo extends Entity
{
    protected array $casts = [
        'id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'logo' => 'string',
        'contact' => ContactInfo::class,
        'homePage' => 'string',
        'address' => 'string',
        'isActive' => 'bool',
        'longitude' => 'float',
        'latitude' => 'float',
        'networkId' => 'string',
        'logoImage' => 'string',
        'phone' => 'string',
        'website' => 'string',
        'averageCheque' => 'string',
        'workTime' => 'string',
        'bizOrganizationType' => 'int',
        'currencyIsoName' => 'string',
    ];
}
