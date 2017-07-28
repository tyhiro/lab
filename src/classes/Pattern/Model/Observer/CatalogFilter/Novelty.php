<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Подборка новинок
 * Class Novelty
 * @package Pattern\Observer\CatalogFilter
 */
class Novelty extends AbstractCollection
{

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        echo sprintf(
            "Novelty filtered by  %s <br>",
            join(', ', $this->filterQuery)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update(FilterInterface $filter)
    {
        $this->filterQuery = $filter->getFilterParams();
        $this->render();
    }
}
