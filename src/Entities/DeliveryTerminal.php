<?php


namespace KMA\IikoApi\Entities;

use KMA\IikoApi\Entity;

/**
 * Доставочный ресторан, подключённый к другому ресторану (доставочный терминал)
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.blcnw751j0yr
 */
class DeliveryTerminal extends Entity
{
    /**
     * @var string GUID Идентификатор организации, к которой относится доставочный терминал
     */
    public string $organizationId;

    /**
     * @var string Наименование доставочного терминала
     */
    public string $deliveryRestaurantName;

    /**
     * @var null|string Имя группы, используемое для определения, к какому предприятию/группе относится терминал.
     */
    public ?string $deliveryGroupName = null;

    /**
     * @var string GUID Идентификатор доставочного терминала
     */
    public string $deliveryTerminalId;

    /**
     * @var null|string Имя ресторана
     */
    public ?string $name = null;

    /**
     * @var null|string Адрес ресторана
     */
    public ?string $address = null;

    /**
     * @var null|\KMA\IikoApi\Entities\OpeningHours[] Время работы ресторана
     */
    public ?array $openingHours = null;

    /**
     * @var null|int Номер ревизии сущности из РМС
     */
    public ?int $externalRevision = null;

    /**
     * @var null|string technicalInformation
     */
    public ?string $technicalInformation = null;
}
