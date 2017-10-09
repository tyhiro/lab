<?php
namespace Pattern\Service\Articles;

use Pattern\Model\Articles\ArticlesTableInterface;
use Pattern\Model\Articles\ScienceTable;

/**
 * Class ScienceArticles
 * @package Pattern\Service\Articles
 */
class ScienceArticles extends AbstractArticles
{

    /**
     * Фабричный метод, вернет таблищу для подборок
     * @return ArticlesTableInterface
     */
    protected function getTableGateway()
    {
        return new ScienceTable();
    }
}
