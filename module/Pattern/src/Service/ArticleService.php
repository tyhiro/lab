<?php
namespace Pattern\Service;

use Pattern\Factory\ArticlesFactory;
use Pattern\Model\Articles\Article;
use Pattern\Service\Articles\AbstractArticles;
use Zend\Db\ResultSet\HydratingResultSet;

class ArticleService
{
    private $articlesFactory;

    public function __construct()
    {
        $this->articlesFactory = new ArticlesFactory();
    }

    /**
     * Вернет подборки определенного типа
     * @param string $type
     * @return HydratingResultSet|Article[]
     */
    public function getArticles($type)
    {
        /** @var AbstractArticles $articles */
        $articles = $this->articlesFactory->factory($type);
        return $articles->getList();
    }

    /**
     * @param ArticlesFactory $articlesFactory
     */
    public function setArticlesFactory($articlesFactory)
    {
        $this->articlesFactory = $articlesFactory;
    }
}