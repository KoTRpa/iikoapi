<?php

namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Type\ShortDateTime;

class Customer extends Base
{
    /**
     * Идентификатор
     * Guid
     */
    public ?string $id = null;

    /**
     * Имя
     *
     * Валидация:
     *  - maxlength 60
     *  - required
     */
    public string $name;

    /**
     * Телефонный номер
     *
     * Валидация:
     * - regexp ^(8|\+?\d{1,3})?[ -]?\(?(\d{3})\)?[ -]?(\d{3})[ -]?(\d{2})[ -]?(\d{2})$
     * - maxlength 40
     * - required
     */
    public string $phone;

    /**
     * Языковая культура пользователя,
     * пример: RU-ru
     */
    public ?string $cultureName = null;

    /**
     * Любимое блюдо пользователя
     */
    public ?string $favouriteDish = null;

    /** День рождения */
    public ?ShortDateTime $birthday = null;

    /**
     * email
     *
     * Валидация:
     *  - email
     *  - maxlength 60
     */
    public ?string $email = null;

    /**
     * Никнэйм
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $nick = null;

    /**
     * Отчество
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $middleName = null;

    /**
     * Фамилия
     *
     * Валидация:
     *  - maxlength 60
     */
    public ?string $surName = null;

    /**
     * Получает ли пользователь информацию о промо акциях
     */
    public ?bool $shouldReceivePromoActionsInfo = null;

    /**
     * Пол:
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
     * Идентификатор изображения пользователя
     */
    public ?string $imageId = null;

    /**
     * {“Key”:””,”Value”:””}[]
     * массив key-value значений дополнительных свойств
     * TODO: make PropertyCollection Type
     */
    public ?array $customProperties = null;

    /**
     * {“Key”:””,”Value”:””}[]
     * массив key-value значений публичных дополнительных свойств
     * TODO: make PropertyCollection Type
     */
    public ?array $publicCustomProperties = null;

    /** Баланс пользователя */
    public ?float $balance = null;

    /**
     * Заблокирован ли пользователь в организации
     */
    public ?bool $isBlocked = null;

    /**
     * CustomerPhone[]
     * Дополнительные телефоны
     * TODO: CustomerPhone Type
     * {"phone": "123"}
     */
    public ?array $additionalPhones = null;

    /**
     * CustomerAddress[]
     * Адреса
     * TODO: CustomerAddress Type
     */
    public ?array $addresses = null;

    /**
     * GuestCardInfo[]
     * Карты
     * TODO: GuestCardInfo Type
     */
    public ?array $cards = null;


    /**
     * Customer constructor.
     * @param string $name
     * @param string $phone
     */
    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @param array $data
     * @return Customer
     */
    public static function fromArray(array $data): Customer
    {
        $data = static::clear($data);

        if (!isset($data['name']) || !isset($data['phone'])) {
            throw new \InvalidArgumentException('name and phone is required');
        }

        $self = new self($data['name'], $data['phone']);
        unset($data['name'], $data['phone']);

        $data = array_filter($data, function($el) {
            return ($el !== null);
        });

        foreach ($data as $prop => $value) {
            switch ($prop) {
                case 'birthday':
                    $self->birthday = new ShortDateTime($value);
                    break;
                default:
                    if (property_exists(self::class, $prop)) {
                        $self->$prop = $value;
                    }
            }
        }

        return $self;
    }
}
