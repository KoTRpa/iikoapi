<?php


namespace KMA\IikoApi\Entity;

/**
 * Концепция
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.2kteaosfihfe
 */
class ConceptionInfo extends Base
{
    /**
     * @var string GUID Идентификатор концепции
     */
    public string $id;

    /**
     * @var string Название концепции
     */
    public string $name;

    /**
     * @var string Код концепции
     */
    public string $code;
}
