<?php
namespace Other\Model\View;

/**
 * Class ProductWIshList
 * @package Pattern\Model\Other\View
 */
class ProductWIshList
{

    /** @var  string $field3 */
    private $field3;
    /** @var  string $field4 */
    private $field4;

    /**
     * @return string
     */
    public function getField3()
    {
        return $this->field3;
    }

    /**
     * @param string $field3
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;
    }

    /**
     * @return string
     */
    public function getField4()
    {
        return $this->field4;
    }

    /**
     * @param string $field4
     */
    public function setField4($field4)
    {
        $this->field4 = $field4;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return [
            __CLASS__,
            'fields' => [
                $this->getField3(),
                $this->getField4()
            ]
        ];
    }
}
