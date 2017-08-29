<?php
namespace Pattern\Service\Articles;

use Pattern\Model\Articles\ArticlesTableInterface;
use Pattern\Model\Articles\BlogTable;

/**
 * Class BlogArticles
 * @package Pattern\Service\Articles
 */
class BlogArticles extends AbstractArticles
{
    /**
     * Фабричный метод, вернет таблищу для подборок
     * @return ArticlesTableInterface
     */
    protected function getTableGateway()
    {
        return new BlogTable();
    }
}
