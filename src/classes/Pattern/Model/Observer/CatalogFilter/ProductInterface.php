<?php

namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Interface ProductInterface
 * @package Pattern\Model\Observer\CatalogFilter
 */
interface ProductInterface extends RenderProductInterface, ObserverInterface
{

    /**
     * @return array
     */
    public function getFilterQuery();
}
