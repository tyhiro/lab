<?php
namespace Queue\Controller;

use Queue\Exception\AMQPBindException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Queue\Exception\QueueException;

class QueueController
{

    /** @var  \AMQPConnection $amqpConnection */
    protected $amqpConnection;
    /** @var  \AMQPExchange $amqpExchange */
    protected $amqpExchange;
    /** @var  \AMQPQueue $amqpQueue */
    protected $amqpQueue;
    protected $initialized = false;


    protected $exchangeName = 'tyhiro.loc';
    protected $queueName = 'default';
    protected $routingKey = 'default';

    protected $nextTry = [30];

    protected $runId;
    protected $count;

    protected $alreadyAdded = [];
    protected $active = true;

    public function indexAction(Request $request)
    {
        ob_start();
        var_dump($request->attributes->all());

        $this->init();


        $result = ob_get_clean();

        $response = new Response($result . rand());

        $date = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
        $response->setCache([
            'public'        => true,
            'etag'          => 'abcde',
            'last_modified' => $date,
            'max_age'       => 10,
            's_maxage'      => 10,
        ]);

        return $response;
    }

    /**
     * @throws QueueException
     */
    public function init()
    {
        if ($this->initialized) {
            return;
        }

        try {
            $this->connect();

            $channel = new \AMQPChannel($this->amqpConnection);

            $this->amqpExchange = new \AMQPExchange($channel);
            $this->amqpExchange->setName($this->getExchangeName());
            $this->amqpExchange->setType(AMQP_EX_TYPE_DIRECT);
            $this->amqpExchange->declareExchange();

            $this->amqpQueue = new \AMQPQueue($channel);
            $this->amqpQueue->setName($this->getQueueName());
            $this->amqpQueue->setFlags(AMQP_DURABLE);
            $this->amqpQueue->setArgument('x-max-priority', 255);
            $this->setCount($this->amqpQueue->declareQueue());

            // single queue is bind to single routing key
            if (!$this->amqpQueue->bind($this->getExchangeName(), $this->getRoutingKey())) {
                throw new AMQPBindException($this->getRoutingKey(), $this->getExchangeName());
            }
        } catch (\AMQPConnectionException $e) {
            throw new QueueException('AMQP Connection Exception: Lost connection with queue:', 0, $e);
        } catch (\AMQPChannelException $e) {
            throw new QueueException('AMQP Channel Exception: Queue channel is not open', 0, $e);
        } catch (\AMQPExchangeException $e) {
            throw new QueueException('AMQP Exchange Exception: Queue amqp_channel'
                . ' is not connected to a broker', 0, $e);
        } catch (\AMQPException $e) {
            throw new QueueException('General AMQP Exception: Errors with parsing'
                . ' parameters for queue. Options error', 0, $e);
        } catch (\Exception $e) {
            throw new QueueException('Unknown exception during queue exchange creation', 0, $e);
        }

        $this->initialized = true;
    }

    /**
     * @throws QueueException
     */
    protected function connect()
    {
        if (!($this->amqpConnection instanceof \AMQPConnection) || !$this->amqpConnection->isConnected()) {
            $this->amqpConnection = new \AMQPConnection($this->getConnectionParams());
            if (!$this->amqpConnection->connect() || !$this->amqpConnection->isConnected()) {
                $encodeOptions = JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP|JSON_PRETTY_PRINT;

                throw new QueueException(
                    "Can't create connection with parameters: "
                    . json_encode($this->getConnectionParams(), $encodeOptions)
                );
            }
        }
    }

    /**
     * @return array
     */
    protected function getConnectionParams()
    {
        return [
            'host'          => 'tyhiro-rabbit',
            'vhost'         => '',
            'port'          => 5672,
            'login'         => 'guest',
            'password'      => 'guest',
            'exchange_name' => 'leos.content',
            'read_timeout'  => 30,
            'write_timeout' => 30,
            // timeouts before next try after error
            'next_try'      => [30, 45, 60, 90, 120, 180, 300, 420, 600, 900, 1200, 1800, 3600],
            'error_time'    => 30,
            'life_time'     => 1200,
            // max items to parse/send in a single sync call (when supported, e.g. for api gateway)
            'batch_call'    => 1,
        ];
    }

    /**
     * @return string
     */
    public function getExchangeName()
    {
        return $this->exchangeName;
    }

    /**
     * @param string $exchangeName
     */
    public function setExchangeName($exchangeName)
    {
        $this->exchangeName = $exchangeName;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @param string $queueName
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
    }

    /**
     * @return string
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    /**
     * @param string $routingKey
     */
    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}
