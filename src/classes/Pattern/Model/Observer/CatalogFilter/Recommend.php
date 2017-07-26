<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Подборка рекомендаций
 * Class Recommend
 * @package Pattern\Observer\CatalogFilter
 */
class Recommend implements ProductInterface
{
    /** @var array $filterQuery */
    private $filterQuery = [];

    /**
     * Recommend constructor.
     * @param FilterInterface $filter
     */
    public function __construct(FilterInterface $filter)
    {
        $filter->attach($this);
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

    /**
     * {@inheritdoc}
     */
    public function update(FilterInterface $filter)
    {
        $this->filterQuery = $filter->getFilterParams();
        $this->render();
    }
}
