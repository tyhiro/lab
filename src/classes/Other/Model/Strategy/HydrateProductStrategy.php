<?php

namespace Other\Model\Strategy;

use Other\Model\Db\ResultSet\AbstractHydratingStrategy;

/**
 * Class HydrateProductStrategy
 * @package Other\Model\Strategy¬
 */
class HydrateProductStrategy extends AbstractHydratingStrategy
{

    public function hydrateField1($value, $data = null)
    {
        return $value .= '_hydrated';
    }
}
