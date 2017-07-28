<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Подборка рекомендаций
 * Class Recommend
 * @package Pattern\Observer\CatalogFilter
 */
class Recommend extends AbstractCollection
{

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        echo sprintf(
            "Recommend filtered by  %s <br>",
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
