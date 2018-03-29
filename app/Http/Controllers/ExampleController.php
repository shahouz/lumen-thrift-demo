<?php

namespace App\Http\Controllers;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use App\Service\LumenServiceClient;

class ExampleController extends Controller
{
    public function __construct()
    {
        $socket = new TSocket('localhost', 9898);
        $transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($transport);
        $client = new LumenServiceClient($protocol);

        $this->socket = $socket;
        $this->transport = $transport;
        $this->protocol = $protocol;
        $this->client = $client;
    }

    public function javaVisitor()
    {
        try {
            $this->transport->open();
            $rs = $this->client->helloString(" World! ");
            $this->transport->close();
            return $rs;
        } catch (\Exception $e) {
            print 'TException:' . $e->getMessage() . PHP_EOL;
        }
    }
}
