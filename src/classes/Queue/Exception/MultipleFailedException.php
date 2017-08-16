<?php


namespace Queue\Exception;

class MultipleFailedException extends \Exception
{
    /**
     * @var array
     */
    protected $messages = [];

    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
