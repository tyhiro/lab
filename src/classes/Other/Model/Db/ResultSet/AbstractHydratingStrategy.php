<?php


namespace Other\Model\Db\ResultSet;


class AbstractHydratingStrategy implements HydratingStrategyInterface
{

    /**
     * @param $propertyName
     * @param $value
     * @param null $data
     * @return mixed
     */
    public function hydrate($propertyName, $value, $data = null)
    {
        $result = $value;

        $method = $this->getMethodForProperty($propertyName);
        if (method_exists($this, $method)) {
            $result = $this->$method($value, $data = null);
        }

        return $result;
    }

    /**
     * Формирует camelCase наименование метода
     * @param string $propertyName
     * @return string - 'hydratePropertyName'
     */
    private function getMethodForProperty($propertyName)
    {
        $method = '';

        $propertyName = trim($propertyName);

        if (trim($propertyName)) {
            $method = str_replace('_', ' ', $propertyName);
            $method = ucwords($method);
            $method = str_replace(' ', '', $method);
            $method = 'hydrate' . $method;
        }

        return $method;
    }
}
