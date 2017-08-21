<?php

namespace Pattern\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class PatternController
 * @package Pattern\Controller
 */
class PatternController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    public function factoryAction()
    {
        return new ViewModel(['factory' => 'factory']);
    }
}