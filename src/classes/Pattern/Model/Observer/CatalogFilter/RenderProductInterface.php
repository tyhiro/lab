<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Interface RenderProductInterface
 * @package Pattern\Observer\CatalogFilter
 */
interface RenderProductInterface
{
    /**
     * Отображает товары
     * @return mixed
     */
    public function render();
}