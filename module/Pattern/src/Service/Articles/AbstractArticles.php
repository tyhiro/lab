<?php
namespace Pattern\Service\Articles;

use Pattern\Model\Articles\Article;
use Pattern\Model\Articles\ArticlesTableInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ClassMethods;

abstract class AbstractArticles
{
    /**
     * @return HydratingResultSet|Article[]
     */
    final public function getList()
    {
        $resultSet = new HydratingResultSet(new ClassMethods(), new Article());
        $resultSet->initialize($this->getTableGateway()->fetchAll());
        $resultSet->buffer();
        return $resultSet;
    }

    /**
     * Фабричный метод, вернет таблищу для подборок
     * @return ArticlesTableInterface
     */
    abstract protected function getTableGateway();
}
