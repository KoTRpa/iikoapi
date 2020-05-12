<?php

namespace KMA\IikoApi\Entity;

class PaymentItem extends Base
{
    /**
     * Сумма к оплате
     *  - required
     */
    public float $sum;

    /**
     * Тип оплаты
     * (одно из полей: id, code является обязательным)
     *  - required
     */
    public PaymentType $paymentType;

    /**
     * Является ли позиция оплаты проведенной
     *  - required
     */
    public bool $isProcessedExternally;

    /**
     * Является ли позиция оплаты предварительной
     */
    public ?bool $isPreliminary = null;

    /**
     * Принята ли позиция оплаты извне
     */
    public ?bool $isExternal = null;

    /**
     * Дополнительная информация
     */
    public ?string $additionalData = null;

    /**
     * Дополнительная информация о чеке оплаты
     * TODO: make ChequeAdditionalInfo
     */
    public ?array $chequeAdditionalInfo = null;


    /**
     * PaymentItem constructor.
     * @param float $sum
     * @param PaymentType $paymentType
     * @param bool $isProcessedExternally
     */
    public function __construct(float $sum, PaymentType $paymentType, bool $isProcessedExternally)
    {
        $this->sum = $sum;
        $this->paymentType = $paymentType;
        $this->isProcessedExternally = $isProcessedExternally;
    }
}
