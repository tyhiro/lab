<?php
namespace Pattern\Controller;

use Pattern\Enum\ArticlesTypeEnum;
use Pattern\Service\ArticleService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\View\Model\ViewModel;

/**
 * Class PatternArticlesController
 * @package Pattern\Controller
 */
class PatternArticlesController extends AbstractActionController
{
    /** @var ViewModel $view */
    protected $view;
    /** @var ArticleService $articleService */
    protected $articleService;

    /**
     * PatternArticlesController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->view = new ViewModel();
    }

    /**
     * Execute the request
     *
     * @param  MvcEvent $e
     * @return mixed
     * @throws \Zend\Mvc\Exception\DomainException
     */
    public function onDispatch(MvcEvent $e)
    {
        $action = $e->getRouteMatch()->getParam('action');

        if (ArticlesTypeEnum::isValid($action)) {
            $this->view->setTemplate('pattern/pattern-articles/articles.phtml');
        }

        return parent::onDispatch($e);
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function scienceAction()
    {
        try{
            $articles = $this->articleService->getArticles(new ArticlesTypeEnum(ArticlesTypeEnum::SCIENCE));
            $this->view->setVariables([
                'title' => 'science',
                'articles' => $articles
            ]);
        }catch (\Exception $exception){
            /** @var FlashMessenger $flashMessenger */
            $flashMessenger = $this->flashMessenger();
            $flashMessenger->addErrorMessage($exception->getMessage());
            return $this->redirect()->toRoute('articles',[],['query' => ['fr' => 'zend']]);
        }
        return $this->view;
    }

    public function newsAction()
    {
        try{
            $articles = $this->articleService->getArticles(new ArticlesTypeEnum(ArticlesTypeEnum::NEWS));
            $this->view->setVariables([
                'title' => 'news',
                'articles' => $articles
            ]);
        }catch (\Exception $exception){
            /** @var FlashMessenger $flashMessenger */
            $flashMessenger = $this->flashMessenger();
            $flashMessenger->addErrorMessage($exception->getMessage());
            return $this->redirect()->toRoute('articles',[],['query' => ['fr' => 'zend']]);
        }
        return $this->view;
    }

    public function blogAction()
    {
        try{
            $articles = $this->articleService->getArticles(new ArticlesTypeEnum(ArticlesTypeEnum::BLOG));
            $this->view->setVariables([
                'title' => 'blog',
                'articles' => $articles
            ]);
        }catch (\Exception $exception){
            /** @var FlashMessenger $flashMessenger */
            $flashMessenger = $this->flashMessenger();
            $flashMessenger->addErrorMessage($exception->getMessage());
            return $this->redirect()->toRoute('articles',[],['query' => ['fr' => 'zend']]);
        }
        return $this->view;
    }
}
