<?php
namespace Queue\Exception;

class ParserActionException extends \Exception
{
    public function __construct($action, $id = 0, $previous = null)
    {
        parent::__construct($action, $id, $previous);
    }
}
