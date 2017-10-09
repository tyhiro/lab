<?php
namespace Pattern\Enum;

use MyCLabs\Enum\Enum;
/**
 * Виды подборок статей
 * Class ArticlesTypeEnum
 * @package Pattern\Enum
 */
class ArticlesTypeEnum extends Enum
{
    const NEWS = 'news';
    const BLOG = 'blog';
    const SCIENCE = 'science';
}
