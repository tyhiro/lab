<?php

namespace Pattern\Model\Observer\CatalogFilter\Tests;

use Pattern\Model\Observer\CatalogFilter\CollectionFilter;
use Pattern\Model\Observer\CatalogFilter\FilterInterface;
use Pattern\Model\Observer\CatalogFilter\Novelty;
use Pattern\Model\Observer\CatalogFilter\Recommend;

/**
 * Class CollectionFilterTest
 * @package Pattern\Model\Observer\CatalogFilter\Tests
 */
class CollectionFilterTest extends \PHPUnit_Framework_TestCase
{

    /** @var  FilterInterface $filter */
    private $filter;

    public function setUp()
    {
        parent::setUp();
        $this->filter = CollectionFilter::getInstance();
    }

    public function testFilterDataChanged()
    {
        $filterParams = ['brand' => 'test', 'category' => 'test'];

        $novelty = new Novelty();
        $recommend = new Recommend();

        $this->filter->attach($novelty);
        $this->filter->attach($recommend);

        self::assertEquals(2, $this->filter->getObservers()->count());
        $this->filter->setBrand($filterParams['brand']);
        $this->filter->setCategory($filterParams['category']);

        self::assertEquals($filterParams, $this->filter->getFilterParams());
        self::assertEquals($filterParams, $novelty->getFilterQuery());
        self::assertEquals($filterParams, $recommend->getFilterQuery());

        $this->filter->detach($novelty);
        self::assertEquals(1, $this->filter->getObservers()->count());
    }

    public function tearDown()
    {
        $this->filter = null;
        parent::tearDown();
    }
}
