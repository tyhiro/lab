<?php
namespace Pattern\Model;

use Pattern\Model\Ingredients\IngredientInterface;
use Pattern\Model\Ingredients\PizzaIngredientFactoryInterface;

/**
 * Class Pizza
 * @package Pattern\Model
 */
abstract class Pizza implements PizzaInterface
{
    protected $name = 'Pizza';
    /** @var  IngredientInterface $dough */
    protected $dough;
    /** @var  IngredientInterface $sauce */
    protected $sauce;
    /** @var  IngredientInterface $cheese */
    protected $cheese;
    /** @var  IngredientInterface[] $veggies */
    protected $veggies = [];
    /** @var  IngredientInterface $pepperoni */
    protected $pepperoni;
    /** @var  IngredientInterface $clam */
    protected $clam;

    /** @var  PizzaIngredientFactoryInterface $ingredientFactory */
    protected $ingredientFactory;

    /** @var array $process */
    public $traceProcess = [];

    /**
     * Pizza constructor.
     * @param PizzaIngredientFactoryInterface $pizzaIngredientFactory
     */
    public function __construct(PizzaIngredientFactoryInterface $pizzaIngredientFactory)
    {
        $this->ingredientFactory = $pizzaIngredientFactory;
    }

    abstract public function prepare();

    public function bake()
    {
        $this->traceProcess[] = "Bake for 25 minutes at 350";
    }

    public function cut()
    {
        $this->traceProcess[] = "Cutting the pizza into diagonal slices";
    }

    public function box()
    {
        $this->traceProcess[] = "Place pizza in official PizzaStore box";
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getTraceProcess()
    {
        return $this->traceProcess;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
