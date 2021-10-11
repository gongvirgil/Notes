# Swoole

* [Swoole wiki](https://wiki.swoole.com/)

Swoole 是一个 PHP 的 协程 高性能 网络通信引擎，使用 C/C++ 语言编写，提供了多种通信协议的网络服务器和客户端模块。可以方便快速的实现 TCP/UDP服务、高性能Web、WebSocket服务、物联网、实时通讯、游戏、微服务等，使 PHP 不再局限于传统的 Web 领域。

## TCP

```php
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new Swoole\Server("127.0.0.1", 9501);
//监听连接进入事件
$serv->on('Connect', function ($serv, $fd) {
    echo "Client: Connect.\n";
});
//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: ".$data);
});
//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
//启动服务器
$serv->start();
```

## UDP

```php
//创建Server对象，监听 127.0.0.1:9502端口，类型为SWOOLE_SOCK_UDP
$serv = new Swoole\Server("127.0.0.1", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);
//监听数据接收事件
$serv->on('Packet', function ($serv, $data, $clientInfo) {
    //向客户端发送数据
    $serv->sendto($clientInfo['address'], $clientInfo['port'], "Server ".$data);
    var_dump($clientInfo);
});
//启动服务器
$serv->start();
```

## HTTP

```php
$http = new Swoole\Http\Server("0.0.0.0", 9501);
$http->on('request', function ($request, $response) {
    var_dump($request->get, $request->post);
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();
```

## WebSocket

```php
//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new Swoole\WebSocket\Server("0.0.0.0", 9502);
//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    var_dump($request->fd, $request->get, $request->server);
    $ws->push($request->fd, "hello, welcome\n");
});
//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});
//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});
$ws->start();
```

```js
var wsServer = 'ws://127.0.0.1:9502';
var websocket = new WebSocket(wsServer);
websocket.onopen = function (evt) {
    console.log("Connected to WebSocket server.");
};
websocket.onclose = function (evt) {
    console.log("Disconnected");
};
websocket.onmessage = function (evt) {
    console.log('Retrieved data from server: ' + evt.data);
};
websocket.onerror = function (evt, e) {
    console.log('Error occured: ' + evt.data);
};
```

## MQTT(物联网)

...

