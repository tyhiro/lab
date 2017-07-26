<?php
namespace Pattern\Observer\CatalogFilter;

/**
 * Interface ObserverInterface
 * @package Pattern\Observer\CatalogFilter
 */
interface ObserverInterface
{
    /**
     * Обновляет параметры фильтра у подборок
     * @return mixed
     */
    public function update();
}
