<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

use KMA\IikoApi\Entities\Type\ShortDateTime;

/**
 * Заказчик
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.yzwu6ehu8367
 */
class Customer extends Entity
{
    /**
     * @var string|null Идентификатор
     * Guid
     */
    public ?string $id = null;

    /**
     * @var string Имя
     *
     * Валидация:
     *  - maxlength 60
     *  - required
     */
    public string $name;

    /**
     * @var string Телефонный номер
     *
     * Валидация:
     * - regexp ^(8|\+?\d{1,3})?[ -]?\(?(\d{3})\)?[ -]?(\d{3})[ -]?(\d{2})[ -]?(\d{2})$
     * - maxlength 40
     * - required
     */
    public string $phone;

    /**
     * @var string|null Языковая культура пользователя,
     * пример: RU-ru
     */
    public ?string $cultureName = null;

    /**
     * @var string|null Любимое блюдо пользователя
     */
    public ?string $favouriteDish = null;

    /** @var ShortDateTime|null День рождения */
    public ?ShortDateTime $birthday = null;

    /**
     * @var string|null email
     *
     * Валидация:
     *  - email
     *  - maxlength 60
     */
    public ?string $email = null;

    /**
     * @var string|null Никнэйм
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $nick = null;

    /**
     * @var string|null Отчество
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $middleName = null;

    /**
     * @var string|null Фамилия
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $surName = null;

    /**
     * @var bool|null Получает ли пользователь информацию о промо акциях
     */
    public ?bool $shouldReceivePromoActionsInfo = null;

    /**
     * @var string|null Пол:
     * NotSpecified = 0,
     * Male = 1,
     * Female = 2.
     * Для входящих запросов передавать 0,1 или 2.
     *
     * Валидация:
     *  - enum (0, 1, 2)
     */
    public ?string $sex = null;

    /**
     * Guid
     * @var string|null Идентификатор изображения пользователя
     */
    public ?string $imageId = null;

    /**
     * {“Key”:””,”Value”:””}[]
     * @var array|null массив key-value значений дополнительных свойств
     * TODO: make PropertyCollection Type
     */
    public ?array $customProperties = null;

    /**
     * {“Key”:””,”Value”:””}[]
     * @var array|null массив key-value значений публичных дополнительных свойств
     * TODO: make PropertyCollection Type
     */
    public ?array $publicCustomProperties = null;

    /** @var float|null Баланс пользователя */
    public ?float $balance = null;

    /**
     * @var bool|null Заблокирован ли пользователь в организации
     */
    public ?bool $isBlocked = null;

    /**
     * CustomerPhone[]
     * @var array|null Дополнительные телефоны
     * TODO: CustomerPhone Type
     * {"phone": "123"}
     */
    public ?array $additionalPhones = null;

    /**
     * CustomerAddress[]
     * @var array|null Адреса
     * TODO: CustomerAddress Type
     */
    public ?array $addresses = null;

    /**
     * GuestCardInfo[]
     * @var array|null Карты
     * TODO: GuestCardInfo Type
     */
    public ?array $cards = null;
}
