<?php

namespace KMA\IikoApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * IikoFacade
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
        return 'Iiko';
    }
}
