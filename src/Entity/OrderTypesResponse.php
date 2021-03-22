<?php


namespace KMA\IikoApi\Entity;

/**
 * Справочник типов заказов
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#bookmark=kix.273308b2kms
 */
class OrderTypesResponse extends Base
{
    /** @var \KMA\IikoApi\Entity\OrderTypeInfo[] */
    public array $items;
}
