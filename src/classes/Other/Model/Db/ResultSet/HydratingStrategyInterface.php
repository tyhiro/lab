<?php


namespace Other\Model\Db\ResultSet;


interface HydratingStrategyInterface
{

    public function hydrate($propertyName, $value, $data = null);
}
