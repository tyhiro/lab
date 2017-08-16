<?php
namespace Queue\Exception;


class EmptySyncIdException extends \Exception
{
    public function __construct($reason = "", $code = 0, \Exception $previous = null)
    {
        $message = 'Empty sync ID found: ' . $reason;
        parent::__construct($message, $code, $previous);
    }
}
