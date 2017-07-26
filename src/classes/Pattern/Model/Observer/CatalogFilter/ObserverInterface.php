<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Interface ObserverInterface
 * @package Pattern\Observer\CatalogFilter
 */
interface ObserverInterface
{
    /**
     * Обновляет параметры фильтра у подборок
     * @param FilterInterface $filter
     * @return mixed
     */
    public function update(FilterInterface $filter);
}