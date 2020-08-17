<?php

namespace KMA\IikoApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Telegram.
 */
class IikoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iiko';
    }
}
