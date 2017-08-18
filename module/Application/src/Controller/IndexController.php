<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return [];
    }

    public function testAction()
    {
        var_dump('test');
        return new ViewModel();
    }
}