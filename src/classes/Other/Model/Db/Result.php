<?php
namespace Other\Model\Db;

/**
 * Class Result
 * @package Pattern\Model\Other\Db
 */
class Result extends \ArrayIterator implements ResultInterface
{

    private $result;

    /**
     * Result constructor.
     * @param array $data
     * @param null $result
     */
    public function __construct(array $data, $result = null)
    {
        if ($result) {
            $this->result = $result;
        }

        parent::__construct($data, 0);
    }

    /**
     * Force buffering
     *
     * @return void
     */
    public function buffer()
    {
        // TODO: Implement buffer() method.
    }

    /**
     * Check if is buffered
     *
     * @return bool|null
     */
    public function isBuffered()
    {
        // TODO: Implement isBuffered() method.
    }

    /**
     * Is query result?
     *
     * @return bool
     */
    public function isQueryResult()
    {
        // TODO: Implement isQueryResult() method.
    }

    /**
     * Get affected rows
     *
     * @return int
     */
    public function getAffectedRows()
    {
        // TODO: Implement getAffectedRows() method.
    }

    /**
     * Get generated value
     *
     * @return mixed|null
     */
    public function getGeneratedValue()
    {
        // TODO: Implement getGeneratedValue() method.
    }

    /**
     * Get the resource
     *
     * @return mixed
     */
    public function getResource()
    {
        // TODO: Implement getResource() method.
    }

    /**
     * Get field count
     *
     * @return int
     */
    public function getFieldCount()
    {
        // TODO: Implement getFieldCount() method.
    }
}
