<?php
namespace Pattern\Observer\CatalogFilter;

/**
 * Подборка рекомендаций
 * Class Recommend
 * @package Pattern\Observer\CatalogFilter
 */
class Recommend implements ObserverInterface, RenderProductInterface
{
    /** @var  FilterInterface $filter */
    private $filter;
    /** @var array $filterQuery */
    private $filterQuery = [];

    public function __construct(FilterInterface $filter)
    {
        $this->filter = $filter;
        $this->filter->registerObserver($this);
    }

    public function update()
    {
        $this->filterQuery = $this->filter->getFilterParams();
        $this->render();
    }

    /**
     * Отображает товары
     * @return mixed
     */
    public function render()
    {
        echo sprintf(
            "Recommend filtered by  %s <br>",
            join(', ', $this->filterQuery)
        );
    }
}
