<?php
/**
 * Class Product
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.d5wifi4jf2l2
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class Product extends Base
{
    /**
     * @var string|null Guid Уникальный идентификатор
     */
    public ?string $id = null;

    /**
     * @var string|null Название
     */
    public ?string $name = null;

    /**
     * @var string|null Артикул
     */
    public ?string $code = null;

    /**
     * @var string|null Описание
     */
    public ?string $description = null;

    /**
     * @var int|null Порядок отображения
     */
    public ?int $order = null;

    /**
     * @var string|null Guid Родительская группа
     */
    public ?string $parentGroup = null;

    /**
     * @var \KMA\IikoApi\Entity\ImageInfo[]|null Описание картинок
     */
    public ?array $images = null;

    /**
     * @deprecated
     * @var string|null Guid Идентификатор картинки(устарело)
     */
    public ?string $imageId = null;

    /**
     * @var string|null Guid Идентификатор группы
     */
    public ?string $groupId = null;

    /**
     * @var string|null Guid Идентификатор категории продукта
     */
    public ?string $productCategoryId = null;

    /**
     * @var float|null Цена
     */
    public ?float $price = null;

    /**
     * @var float|null Количество углеводов на 100 г блюда
     */
    public ?float $carbohydrateAmount = null;

    /**
     * @var float|null Энергетическая ценность на 100 г блюда
     */
    public ?float $energyAmount = null;

    /**
     * @var float|null Количество жиров на 100 г блюда
     */
    public ?float $fatAmount = null;

    /**
     * @var float|null Количество белков на 100 г блюда
     */
    public ?float $fiberAmount = null;

    /**
     * @var float|null Количество углеводов в блюде
     */
    public ?float $carbohydrateFullAmount = null;

    /**
     * @var float|null Энергетическая ценность в блюде
     */
    public ?float $energyFullAmount = null;

    /**
     * @var float|null Количество жиров в блюде
     */
    public ?float $fatFullAmount = null;

    /**
     * @var float|null Количество белков в блюде
     */
    public ?float $fiberFullAmount = null;

    /**
     * @var float|null Вес одной единицы в кг
     */
    public ?float $weight = null;

    /**
     * @var string|null Тип: dish - блюдо, good - товар, modifier - модификатор
     */
    public ?string $type = null;

    /**
     * @var bool|null Нужно ли продукт отображать в дереве номенклатуры
     */
    public ?bool $isIncludedInMenu = null;

    /**
     * @var \KMA\IikoApi\Entity\Modifier[]|null Одиночные модификаторы
     */
    public ?array $modifiers = null;

    /**
     * @var \KMA\IikoApi\Entity\Modifier[]|null Групповые модификаторы
     */
    public ?array $groupModifiers = null;

    /**
     * @var string|null Дополнительная информация
     */
    public ?string $additionalInfo = null;

    /**
     * @var string[]|null Тэги
     */
    public ?array $tags = null;

    /**
     * @var string|null Единица измерения товара ( кг, л, шт, порц.)
     */
    public ?string $measureUnit = null;

    /**
     * @var bool|null Блюдо не нужно печатать на чеке. Актуально только для модификаторов.
     */
    public ?bool $doNotPrintInCheque = null;

    /**
     * @var string|null SEO-описание для клиента
     */
    public ?string $seoDescription = null;

    /**
     * @var string|null SEO-ключевые слова
     */
    public ?string $seoKeywords = null;

    /**
     * @var string|null SEO-текст для роботов
     */
    public ?string $seoText = null;

    /**
     * @var string|null SEO-заголовок
     */
    public ?string $seoTitle = null;

    /**
     * @var array|null Guid[] Список ID терминалов, на которых продукт запрещен к продаже
     */
    public ?array $prohibitedToSaleOn = null;

    /**
     * @var \KMA\IikoApi\Entity\CustomTerminalPriceInfo[]|null Список терминалов, на которых цена продукта отличается от стандартной и цен на них.
     */
    public ?array $differentPricesOn = null;

    /**
     * @var bool|null Товар продается на вес
     */
    public ?bool $useBalanceForSell = null;
}
