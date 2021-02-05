<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Оценка клиента
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.nu5cs954om3f
 */
class DeliveryOpinionMark extends Entity
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