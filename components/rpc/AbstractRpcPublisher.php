<?php


namespace app\components\rpc;


use ErrorException;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

abstract class AbstractRpcPublisher
{
    const HOST =  '192.168.40.67';
    const PORT =  5672;
    const USER = 'web';
    const PASS = 'zoo_market';

    /**
     * @var AMQPStreamConnection
     */
    private $connection;
    /**
     * @var AMQPChannel
     */
    protected $channel;
    /**
     * @var string
     */
    protected $callback_queue;
    /**
     * @var string
     */
    protected $response;
    /**
     * @var integer
     */
    protected $corr_id;

    /**
     * @var string
     */
    private $queue;

    public function __construct($queue)
    {
        $this->queue = $queue;

        //Настраиваем соединение
        $this->connection = new AMQPStreamConnection(
            self::HOST,
            self::PORT,
            self::USER,
            self::PASS
        );

        //Создаем канал
        $this->channel = $this->connection->channel();

        // Создаем (объявляем) очередь
        list($this->callback_queue, ,) = $this->channel->queue_declare(
            "",
            false,
            false,
            true,
            false
        );

        //Запускаем потребителя (слушателя) очереди
        $this->channel->basic_consume(
            $this->callback_queue,
            '',
            false,
            true,
            false,
            false,
            array(
                $this,
                'onResponse'
            )
        );
    }

    /**
     * @param AMQPMessage $rep
     */
    public function onResponse(AMQPMessage $rep)
    {
        if ($rep->get('correlation_id') == $this->corr_id) {
            $this->response = $rep->body;
        }
    }

    /**
     * @param string $message
     * @return null
     * @throws ErrorException
     */
    public function call($message)
    {
        $this->response = null;
        $this->corr_id = uniqid();

        //создаем сообщение
        $msg = new AMQPMessage(
            $message,
            [
                'correlation_id' => $this->corr_id,
                'reply_to' => $this->callback_queue
            ]
        );

        // Публикуем сообщение
        $this->channel->basic_publish(
            $msg,
            '',
            $this->queue);

        while (!$this->response) {
            $this->channel->wait();
        }

        return $this->response;
    }

}