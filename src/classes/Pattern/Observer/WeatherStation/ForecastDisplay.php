<?php
namespace Pattern\Observer\WeatherStation;

/**
 * Class ForecastDisplay
 * @package Pattern\Observer\WeatherStation
 */
class ForecastDisplay implements ObserverInterface, DisplayElementInterface
{
    /** @var  float $currentPressure - текущее значение атмосферного давления */
    private $currentPressure;
    /** @var  float $lastPressure - последние данные атмосферного давления */
    private $lastPressure;
    /** @var SubjectInterface $weatherData - объект для регистрации наблюдателя */
    private $weatherData;

    public function __construct(SubjectInterface $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }

    /**
     * {@inheritdoc}
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->lastPressure = $this->currentPressure ?: 29.2;
        $this->currentPressure = $pressure;
        $this->display();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        if ($this->currentPressure > $this->lastPressure) {
            $state = "Improving weather on the way!";
        } elseif ($this->currentPressure == $this->lastPressure) {
            $state = "More of the same";
        } else {
            $state = "Watch out for cooler, rainy weather";
        }
        echo sprintf("Forecast: %s <br>", $state);
    }
}
