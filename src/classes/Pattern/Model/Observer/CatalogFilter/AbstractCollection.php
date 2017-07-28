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
     * AbstractCollection constructor.
     * @param FilterInterface $filter
     */
    public function __construct(FilterInterface $filter)
    {
        $filter->attach($this);
    }

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
