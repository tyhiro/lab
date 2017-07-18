<?php
namespace Pattern\Observer\WeatherStation;

/**
 * Класс субъекта, управляющим состоянием
 * Class WeatherData
 * @package Pattern\Observer\WeatherStation
 */
class WeatherData implements SubjectInterface
{
    /**  @var ObserverInterface[] $observers - список подписчиков */
    private $observers;
    /** @var  float $temperature - температура */
    private $temperature;
    /** @var  float $humidity - влажность */
    private $humidity;
    /** @var  float $pressure - атмосферное давление */
    private $pressure;

    /**
     * WeatherData constructor.
     */
    public function __construct()
    {
        $this->observers = [];
    }

    /**
     * {@inheritdoc}
     */
    public function registerObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * {@inheritdoc}
     */
    public function removeObserver(ObserverInterface $observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function notifyObserver()
    {
        foreach ($this->observers as $obj) {
            $obj->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    /**
     * Оповещает наблюдателей об изменившемся состоянии
     */
    public function measurementsChanged()
    {
        $this->notifyObserver();
    }

    /**
     * Изменяет состояние субъекта
     * @note - вызывается метод measurementsChanged, оповещающий подписчиков
     * @param float $temperature - температура
     * @param float $humidity - влажность
     * @param float $pressure - атмосферное давление
     */
    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}
