<?php


namespace KMA\IikoApi\Entity;

/**
 * Оценка клиента
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.nu5cs954om3f
 */
class DeliveryOpinionMark extends Base
{
    /**
     * @var string GUID вопроса
     */
    public string $surveyItemId;

    /**
     * @var int Оценка
     */
    public int $mark;
}
