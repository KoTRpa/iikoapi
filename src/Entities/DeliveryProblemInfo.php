<?php

namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Проблема доставки
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.sw6ofwhaja0v
 */
class DeliveryProblemInfo extends Entity
{
    /**
     * @var bool Признак проблемы
     */
    public bool $hasProblem;

    /**
     * @var string Описание проблемы
     */
    public string $problem;
}