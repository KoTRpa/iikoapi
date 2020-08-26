<?php

namespace KMA\IikoApi\Traits;

use Illuminate\Contracts\Container\Container;

/**
 * HasContainer.
 */
trait HasContainer
{
    /**
     * @var Container|null IoC Container
     */
    protected static ?Container $container = null;

    /**
     * Set the IoC Container.
     *
     * @param $container Container instance
     */
    public static function setContainer(Container $container)
    {
        self::$container = $container;
    }

    /**
     * Get the IoC Container.
     *
     * @return Container
     */
    public function getContainer(): Container
    {
        return self::$container;
    }

    /**
     * Check if IoC Container has been set.
     *
     * @return bool
     */
    public function hasContainer(): bool
    {
        return self::$container !== null;
    }
}
