<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Interface FilterInterface
 * @package Pattern\Observer\CatalogFilter
 */
interface FilterInterface extends SubjectInterface
{
    /**
     * Вернет поля, по которым будут фильтроваться подборки
     * @return array
     */
    public function getFilterParams();

    /**
     * @return \SplObjectStorage
     */
    public function getObservers();

    /**
     * @param string $brand
     */
    public function setBrand($brand);

    /**
     * @param string $category
     */
    public function setCategory($category);
}
