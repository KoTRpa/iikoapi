<?php
/**
 * Class ImageInfo
 * @package KMA\IikoApi\Entity
 * @see https://docs.google.com/document/d/1pRQNIn46GH1LVqzBUY5TdIIUuSCOl-A_xeCBbogd2bE/edit#heading=h.l38n0xo213eo
 *
 * @noinspection PhpUnused
 */

namespace KMA\IikoApi\Entity;

class ImageInfo extends Entity
{

    /**
     * @var string Guid Идентификатор картинки
     */
    public string $imageId;

    /**
     * @var string URL для загрузки картинки
     */
    public string $imageUrl;

    /**
     * @var string|null Дата выгрузки картинки в формате "yyyy-MM-dd HH:mm:ss"
     */
    public ?string $uploadDate = null;
}
