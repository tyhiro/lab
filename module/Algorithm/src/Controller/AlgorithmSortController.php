<?php
namespace Algorithm\Controller;

use Algorithm\Service\SortService;
use Zend\Mvc\Controller\AbstractActionController;

class AlgorithmSortController extends AbstractActionController
{
    /** @var  SortService $sortService */
    private $sortService;

    /**
     * AlgorithmSortController constructor.
     * @param SortService $sortService
     */
    public function __construct(SortService $sortService)
    {
        $this->sortService = $sortService;
    }

    public function indexAction()
    {
        $this->sortService->test();
        return [];
    }
}
