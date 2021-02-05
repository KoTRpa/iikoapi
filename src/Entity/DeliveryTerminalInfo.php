<?php


namespace KMA\IikoApi\Entity;

/**
 * Доставочный терминал
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.m1n1hoethjnt
 */
class DeliveryTerminalInfo extends Entity
{
    /**
     * @var string GUID Идентификатор доставочного терминала
     */
    public string $deliveryTerminalId;

    /**
     * @var string CrmId ресторана, к которому относится доставочный терминал
     */
    public string $crmId;

    /**
     * @var string Наименование доставочного терминала
     */
    public string $restaurantName;

    /**
     * @var int|null Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;

    /**
     * @var string|null Техническая информация
     */
    public ?string $technicalInformation = null;

    /**
     * @var string|null Адрес ресторана
     */
    public ?string $address = null;

    /**
     * @var int|null Версия протокола
     * 0 для старых версий рмс
     * 1 и выше для версий от 7.1.2 и старше (поддержка в api с версии 7.1.5)
     */
    public ?int $protocolVersion = null;
}
