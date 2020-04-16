<?php


namespace app\components\rpc;


use PhpAmqpLib\Message\AMQPMessage;

interface RpcPublisherInterface
{
    public function onResponse(AMQPMessage $rep);

    public function call($value);
}