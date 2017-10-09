<?php
namespace Pattern\Factory;

use Pattern\Enum\ArticlesTypeEnum;
use Pattern\Service\Articles\AbstractArticles;
use Pattern\Service\Articles\BlogArticles;
use Pattern\Service\Articles\NewsArticles;
use Pattern\Service\Articles\ScienceArticles;

class ArticlesFactory
{
    /**
     * @param $type
     * @return AbstractArticles
     * @throws \InvalidArgumentException
     */
    public function factory($type)
    {
        $type = filter_var($type, FILTER_FLAG_EMPTY_STRING_NULL);
        if (!ArticlesTypeEnum::isValid($type)) {
            throw new \InvalidArgumentException('Type ' . $type . ' of articles not found');
        }

        switch ($type) {
            case ArticlesTypeEnum::NEWS:
                return new NewsArticles();
                break;
            case ArticlesTypeEnum::BLOG:
                return new BlogArticles();
                break;
            case ArticlesTypeEnum::SCIENCE:
                return new ScienceArticles();
                break;
        }
    }
}
