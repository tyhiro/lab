<?php
namespace Other\Model;

/**
 * Class Product
 * @package Pattern\Model\Other\View
 */
class Product
{

    /** @var  string $field1 */
    private $field1;
    /** @var  string $field2 */
    private $field2;

    /**
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * @param string $field1
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;
    }

    /**
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }

    /**
     * @param string $field2
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return [
            __CLASS__,
            'fields' => [
                $this->getField1(),
                $this->getField2()
            ]
        ];
    }
}
