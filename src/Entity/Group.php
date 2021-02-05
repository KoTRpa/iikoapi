<?php
/**
 * Class Group
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.s9q6w0yk20hl
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class Group extends Entity
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
     * @var ImageInfo[]|null URLs картинок
     */
    public ?array $images = null;

    /**
     * @deprecated
     * @var string|null Guid Идентификатор картинки(устарело)
     */
    public ?string $imageId = null;

    /**
     * @var bool|null Нужно ли группу отображать в дереве номенклатуры
     */
    public ?bool $isIncludedInMenu = null;

    /**
     * @var string|null Дополнительная информация
     */
    public ?string $additionalInfo = null;

    /**
     * @var string[]|null Тэги
     */
    public ?array $tags = null;

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
}
