<?php
namespace Pattern\Service\Articles;

use Pattern\Model\Articles\ArticlesTableInterface;
use Pattern\Model\Articles\NewsTable;

/**
 * Class NewsArticles
 * @package Pattern\Service\Articles
 */
class NewsArticles extends AbstractArticles
{
    /**
     * Фабричный метод, вернет таблищу для подборок
     * @return ArticlesTableInterface
     */
    protected function getTableGateway()
    {
        return new NewsTable();
    }
}
