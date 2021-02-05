<?php
/**
 * Class OrganizationInfo
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.oukh8de96nr1
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

/**
 * Class OrganizationUser
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.3xar1hixl2n2
 */
class OrganizationUser extends Entity
{
    /**
     * @var string Guid Идентификатор сотрудника
     */
    public string $id;

    /**
     * @var string|null Имя пользователя
     */
    public ?string $firstName = null;

    /**
     * @var string|null Отчество
     */
    public ?string $middleName = null;

    /**
     * @var string|null Фамилия
     */
    public ?string $lastName = null;

    /**
     * @var string|null Отображаемое имя пользователя
     */
    public ?string $displayName = null;

    /**
     * @var string|null Телефон
     */
    public ?string $phone = null;

    /**
     * @var string|null Мобильный телефон
     */
    public ?string $cellPhone = null;

    /**
     * @var string|null Email сотрудника
     */
    public ?string $email = null;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;

}
