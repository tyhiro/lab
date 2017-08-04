<?php

namespace Queue\Exception;

class AMQPBindException extends \Exception
{
    protected $routingKey;
    protected $exchangeName;

    public function __construct($routingKey, $exchangeName)
    {
        parent::__construct("Failed to bind to exchange");
    }

    /**
     * @return mixed
     */
    public function getExchangeName()
    {
        return $this->exchangeName;
    }

    /**
     * @return mixed
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }
}
