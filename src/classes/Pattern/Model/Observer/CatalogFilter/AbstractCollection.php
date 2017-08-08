<?php

namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Class AbstractCollection
 * @package Pattern\Model\Observer\CatalogFilter
 */
abstract class AbstractCollection implements ProductInterface
{
    /** @var array $filterQuery */
    protected $filterQuery = [];

    /**
     * {@inheritdoc}
     */
    abstract public function update(FilterInterface $filter);

    /**
     * {@inheritdoc}
     */
    abstract public function render();

    /**
     * @return array
     */
    public function getFilterQuery()
    {
        return $this->filterQuery;
    }
}
