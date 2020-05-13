<?php
/**
 * Class CustomTerminalPriceInfo
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.rag4iyqs5o2z
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class CustomTerminalPriceInfo extends Base
{
    /**
     * @var string|null Guid Идентификатор терминала, на котором цена отличается от стандартной
     */
    public ?string $terminalId = null;

    /**
     * @var float|null Цена на терминале
     */
    public ?float $price = null;

    /**
     * @var string|null Guid Идентификатор ценовой категории терминала
     */
    public ?string $priceCategory = null;
}
