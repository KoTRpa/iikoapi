<?php

namespace KMA\IikoApi\Entity;

use KMA\IikoApi\Entity\Concerns\Hashable;

class PaymentItem extends Base
{
    use Hashable;

    protected array $hashFields = [
        'isExternal',
        'isProcessedExternally',
        'sum',
    ];

    /**
     * @var float Сумма к оплате
     *  - required
     */
    public float $sum;

    /**
     * @var \KMA\IikoApi\Entity\PaymentType Тип оплаты
     * (одно из полей: id, code является обязательным)
     *  - required
     */
    public PaymentType $paymentType;

    /**
     * @var bool Является ли позиция оплаты проведенной
     *  - required
     */
    public bool $isProcessedExternally;

    /**
     * @var bool|null Является ли позиция оплаты предварительной
     */
    public ?bool $isPreliminary = null;

    /**
     * @var bool|null Принята ли позиция оплаты извне
     */
    public ?bool $isExternal = null;

    /**
     * @var string|null Дополнительная информация
     */
    public ?string $additionalData = null;

    /**
     * @var array|null Дополнительная информация о чеке оплаты
     * TODO: make ChequeAdditionalInfo
     */
    public ?array $chequeAdditionalInfo = null;
}
