<?php
namespace Pattern\Model\Observer\WeatherStation;

/**
 * Class CurrentConditionsDisplay
 * @package Pattern\Model\Observer\WeatherStation
 */
class CurrentConditionsDisplay implements ObserverInterface, DisplayElementInterface
{
    /** @var  float $temperature - температура */
    private $temperature;
    /** @var  float $humidity - влажность */
    private $humidity;
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
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo sprintf("Current conditions: %01.2f F degress and %01.2f%% humidityy. <br>", $this->temperature, $this->humidity);
    }
}
