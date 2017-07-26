<?php
use Pattern\Observer\WeatherStation\WeatherData;
use Pattern\Observer\WeatherStation\CurrentConditionsDisplay;
use Pattern\Observer\WeatherStation\ForecastDisplay;
use Pattern\Observer\WeatherStation\HeatIndexDisplay;
use Pattern\Observer\WeatherStation\StatisticsDisplay;
use Pattern\Strategy\Toys\Strategy\SingSoundStrategy;
use Pattern\Strategy\Toys\TankToy;
use Pattern\Observer\CatalogFilter\CollectionFilter;
use Pattern\Observer\CatalogFilter\Novelty;
use Pattern\Observer\CatalogFilter\Recommend;

/**
 * @var string $pattern ;
 */
$patterns = [
    'strategy',
    'observer'
];

switch ($pattern) {
    case 'observer':
        /** @var CollectionFilter $filter */
        $filter= CollectionFilter::getInstance();

        $novelty = new Novelty($filter);
        $recommend = new Recommend($filter);

        $filter->setBrand('Chanel');
        $filter->setCategory('Обувь');
        $filter->setBrand('Dior');

        $weatherData = new WeatherData();
        $currentConditionDisplay = new CurrentConditionsDisplay($weatherData);
        $forecastDisplay = new ForecastDisplay($weatherData);
        $heatIndexDisplay = new HeatIndexDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);
        break;
    case 'strategy':
        $toy = new TankToy('Кукла Маша');
        $toy->setName('Кукла ДАша');
        $toy->sound();
        $toy->setSoundOption(new SingSoundStrategy());
        $toy->sound();
        $toy->motion();
        break;
    default:
        echo "use /pattern/{" . join('|', $patterns) . "}";

}
