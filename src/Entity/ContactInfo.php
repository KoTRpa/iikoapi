<?php
/**
 * Class ContactInfo
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1kuhs94UV_0oUkI2CI3uOsNo_dydmh9Q0MFoDWmhzwxc/edit#heading=h.dxb1prml8roo
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class ContactInfo extends Base
{
    /**
     * @var string|null Телефон
     */
    public ?string $phone = null;

    /**
     * @var string|null Адрес
     */
    public ?string $location = null;

    /**
     * @var string|null Адрес электронной почты
     */
    public ?string $email = null;
}
