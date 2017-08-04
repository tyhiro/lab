<?php

namespace Queue\Wrapper;


use Queue\Exception\QueueException;

class Message
{
    /**
     * How objects should be encoded -- arrays or as stdClass. TYPE_ARRAY is 1
     * so that it is a boolean true value, allowing it to be used with
     * ext/json's functions.
     */
    const TYPE_ARRAY = 1;
    const TYPE_OBJECT = 0;

    protected $queue;
    protected $envelope;
    protected $rawMessage;

    private $acknowledgeSent = false;

    public function __construct(\AMQPEnvelope $envelope, \AMQPQueue $queue)
    {
        $this->envelope = $envelope;
        $this->queue = $queue;
        $this->rawMessage = json_decode($envelope->getBody(), self::TYPE_ARRAY);
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                break;
            case JSON_ERROR_DEPTH:
                throw new QueueException('Decoding failed: Maximum stack depth exceeded');
            case JSON_ERROR_CTRL_CHAR:
                throw new QueueException('Decoding failed: Unexpected control character found');
            case JSON_ERROR_SYNTAX:
                throw new QueueException('Decoding failed: Syntax error');
            default:
                throw new QueueException('Decoding failed');
        }
    }

    public function ack()
    {
        if (!$this->acknowledgeSent) {
            $this->queue->ack($this->envelope->getDeliveryTag());
            $this->acknowledgeSent = true;
        }
    }

    public function getRawMessage()
    {
        return $this->rawMessage;
    }

    public function getId()
    {
        return $this->rawMessage['id'];
    }

    public function incErrorCount()
    {
        $this->rawMessage['errorCount'] = intval($this->getErrorCount()) + 1;

        return $this->getErrorCount();
    }

    public function getErrorCount()
    {
        return empty($this->rawMessage['errorCount']) ? 0 : $this->rawMessage['errorCount'];
    }

    public function setNextTry($value)
    {
        $this->rawMessage['nextTry'] = $value;
    }

    public function getNextTry()
    {
        return empty($this->rawMessage['nextTry']) ? 0 : $this->rawMessage['nextTry'];
    }

    public function setLastRunId($value)
    {
        $this->rawMessage['lastRunId'] = $value;
    }

    public function getLastRunId()
    {
        return empty($this->rawMessage['lastRunId']) ? null : $this->rawMessage['lastRunId'];
    }

    public function getReason()
    {
        return empty($this->rawMessage['reason']) ? null : $this->rawMessage['reason'];
    }

    public function setReason($value)
    {
        $this->rawMessage['reason'] = $value;
    }

    public function getCreatedAt()
    {
        return empty($this->rawMessage['createdAt']) ? null : $this->rawMessage['createdAt'];
    }

    public function getPriority()
    {
        return $this->envelope->getPriority();
    }
}
