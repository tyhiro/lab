<?php
namespace Pattern\Model\Observer\WeatherStation;

/**
 * Class HeatIndexDisplay
 * @package Pattern\Model\Observer\WeatherStation
 */
class HeatIndexDisplay implements ObserverInterface, DisplayElementInterface
{
    /** @var  float $currentPressure - значение теплового индекса */
    private $heatIndex;
    /** @var SubjectInterface $weatherData - объект для регистрации наблюдателя */
    private $weatherData;

    public function __construct(SubjectInterface $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
        $this->heatIndex = 0.0;
    }

    /**
     * {@inheritdoc}
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->heatIndex = $this->computeHeatIndex($temperature, $humidity);
        $this->display();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo sprintf("Heat index is %01.2f <br>", $this->heatIndex);
    }

    /**
     * Вычисляет тепловой индекс
     * @param float $t - температура
     * @param float $rh - влажность
     * @return float
     */
    private function computeHeatIndex($t, $rh)
    {
        $tPw2 = pow($t, 2);
        $tPw3 = pow($t, 3);
        $rhPw2 = pow($rh, 2);
        $rhPw3 = pow($rh, 3);
        $index = (float)(
            (16.923 + (0.185212 * $t)
                + (5.37941 * $rh)
                - (0.100254 * $t * $rh)
                + (0.00941695 * $tPw2)
                + (0.00728898 * $rhPw2)
                + (0.000345372 * ($tPw2 * $rh))
                - (0.000814971 * ($t * $rhPw2))
                + (0.0000102102 * ($tPw2 * $rhPw2))
                - (0.000038646 * $tPw3)
                + (0.0000291583 * $rhPw3)
                + (0.00000142721 * ($tPw3 * $rh))
                + (0.000000197483 * ($t * $rhPw3))
                - (0.0000000218429 * ($tPw3 * $rhPw2))
                + 0.000000000843296 * ($tPw2 * $rhPw3)
            )
            - (0.0000000000481975 * ($tPw3 * $rhPw3))
        );
        return $index;
    }
}

