<?php
namespace Pattern\Model\Observer\WeatherStation;

/**
 * Class StatisticsDisplay
 * @package Pattern\Model\Observer\WeatherStation
 */
class StatisticsDisplay implements ObserverInterface, DisplayElementInterface
{
    /** @var  float $minTemp - минимальная температура */
    private $minTemp;
    /** @var  float $maxTemp - максимальная температура */
    private $maxTemp;
    /** @var  float $tempSum -суммарная температура */
    private $tempSum;
    /** @var  int - количество замеров */
    private $numReadings;
    /** @var SubjectInterface $weatherData - объект для регистрации наблюдателя */
    private $weatherData;

    public function __construct(SubjectInterface $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
        $this->minTemp = 200;
        $this->tempSum = 0.0;
    }

    /**
     * {@inheritdoc}
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->tempSum += $temperature;
        $this->numReadings++;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }

        $this->display();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo sprintf(
            "Avg/Max/Min temperature = %01.2f/%01.2f/%01.2f. <br>",
            ($this->tempSum / $this->numReadings),
            $this->maxTemp,
            $this->minTemp
        );
    }
}
