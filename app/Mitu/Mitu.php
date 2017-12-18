<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 17-12-18
 * Time: 下午8:51
 */

namespace App\Mitu;

class Mitu
{
    public $server;
    function StartServe()
    {
        $host =env('MITU_SERVE_HOST');
        $port =env('MITU_SERVE_POST');

        $this->server = new \swoole_server($host, $port);

        $this->server->set(array(
            'worker_num' => 4,
//            'daemonize' => true,
            'backlog' => 128,
        ));

        $this->server->on('connect', function ($server, $fd){
            echo "connection open: {$fd}\n";
        });

        $this->server->on('receive', function ($server, $fd, $reactor_id, $data) {

            if($data == 'exit'){
                $server->close($fd);
            }

            $this->server->send($fd, "Swoole: {$data}");

        });

        $this->server->on('close', function ($server, $fd) {
            echo "connection close: {$fd}\n";
        });

        $this->server->start();
    }


    function StartClient()
    {
        $fhost =env('MITU_SERVE_HOST');

        $fport =env('MITU_SERVE_POST');


        $client = new \swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

        $client->on("connect", function(\swoole_client $cli) {
            $cli->send(" client connect \r\n\r\n");
        });

        $client->on("receive", function(\swoole_client $cli, $data){
            echo "Receive: $data";
            $cli->send(str_repeat('A', 100)."\n");
            sleep(1);
        });


        $client->on("error", function(\swoole_client $cli){
            echo "error\n";
        });

        $client->on("close", function(\swoole_client $cli){
            echo "Connection close\n";
        });

        $client->connect($fhost, $fport);
    }

    function Start($model)
    {
        if($model =='s')
        {
            $this->StartServe();
        }else{
            $this->StartClient();
        }
    }
}