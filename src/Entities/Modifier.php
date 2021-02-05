<?php
/**
 * Class Modifier
 * @package KMA\IikoApi\Entities
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.ez12web8aym2
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entities;

class Modifier extends Entity
{
    /**
     * @var string|null Guid Идентификатор модификатора. Идентификатор продукта для одиночного модификатора и идентификатор группы - для группового.
     */
    public ?string $modifierId = null;

    /**
     * @var int|null Максимальное количество модификатора
     */
    public ?int $maxAmount = null;

    /**
     * @var int|null Минимальное количество модификатора
     */
    public ?int $minAmount = null;

    /**
     * @var float|null Количество по умолчанию
     */
    public ?float $defaultAmount = null;

    /**
     * @var bool|null Признак того, что не нужно отображать список модификаторов, если их количество равно количеству
     */
    public ?bool $hideIfDefaultAmount = null;

    /**
     * @var bool|null Признак того, что дочерние модификаторы имеют ограничения. Актуально только для групповых модификаторов.
     */
    public ?bool $childModifiersHaveMinMaxRestrictions = null;

    /**
     * @var array|null Дочерние модификаторы. Бывают только для групповых модификаторов (?ChoiceBindings[])
     */
    public ?array $childModifiers = null;

    /**
     * @var bool|null
     */
    public ?bool $required = null;
}
