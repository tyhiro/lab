<?php
namespace Pattern\Controller;

use Pattern\Model\Observer\WeatherStation\CurrentConditionsDisplay;
use Pattern\Model\Observer\WeatherStation\ForecastDisplay;
use Pattern\Model\Observer\WeatherStation\HeatIndexDisplay;
use Pattern\Model\Observer\WeatherStation\StatisticsDisplay;
use Pattern\Model\Observer\WeatherStation\WeatherData;
use Pattern\Model\Strategy\Toys\Strategy\SingSoundStrategy;
use Pattern\Model\Strategy\Toys\TankToy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use \Pattern\Model\Observer\Exchange\ProductItem;
use \Pattern\Model\Observer\Exchange\ExchangeRate;

/**
 * Class PatternController
 * @package Pattern\Controller
 */
class PatternController
{

    public function indexAction(Request $request)
    {
        var_dump($request->attributes->all());
        $this->observerAction($request);
        $this->strategyAction($request);
        return new Response('indexAction');
    }

    public function observerAction(Request $request)
    {
        $product1 = new ProductItem();
        $product2 = new ProductItem();

        ExchangeRate::getInstance()->setExchangeRate(4.5);

        $weatherData = new WeatherData();
        $currentConditionDisplay = new CurrentConditionsDisplay($weatherData);
        $forecastDisplay = new ForecastDisplay($weatherData);
        $heatIndexDisplay = new HeatIndexDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);
    }

    public function strategyAction(Request $request)
    {
        $toy = new TankToy('Кукла Маша');
        $toy->setName('Кукла ДАша');
        $toy->sound();
        $toy->setSoundOption(new SingSoundStrategy());
        $toy->sound();
        $toy->motion();
    }
}
