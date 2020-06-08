# rabbitMQ

## 虚拟主机vhost

每一个RabbitMQ服务器都能创建虚拟消息服务器，我们称之为虚拟主机。每一个vhost本质上是一个mini版的RabbitMQ服务器，拥有自己的交换机、队列、绑定等，拥有自己的权限机制。vhost之于Rabbit就像虚拟机之于物理机一样。他们通过在各个实例间提供逻辑上分离，允许为不同的应用程序安全保密的运行数据，这很有，它既能将同一个Rabbit的众多客户区分开来，又可以避免队列和交换器的命名冲突。RabbitMQ提供了开箱即用的默认的虚拟主机“/”，如果不需要多个vhost可以直接使用这个默认的vhost，通过使用缺省的guest用户名和guest密码来访问默认的vhost。

vhost之间是相互独立的，这避免了各种命名的冲突，就像App中的沙盒的概念一样，每个沙盒是相互独立的，且只能访问自己的沙盒，以保证非法访问别的沙盒带来的安全隐患。

### 虚拟主机操作

列举所有虚拟主机 rabbitmqctl list_vhosts
添加虚拟主机 rabbitmqctl add_vhost <vhost_name>
删除虚拟主机rabbitmqctl delete_vhost <vhost_name>
添加用户 add_user <username> <password>
设置用户标签 set_user_tags <username> <tag>// 设置这个才能在页面上登录,tag可以为administrator, monitoring, management
设置权限 set_permissions [-p <vhost>] <user> <conf> <write> <read>
权限配置包括：配置(队列和交换机的创建和删除)、写(发布消息)、读(有关消息的任何操作，包括清除这个队列)
conf:一个正则表达式match哪些配置资源能够被该用户访问。
write:一个正则表达式match哪些配置资源能够被该用户读。
read:一个正则表达式match哪些配置资源能够被该用户访问


## 安装

安装rabbitmq的

* 依赖库 rabbitmq-c
* php扩展包 amqp: rabbitmq是基于amqp协议

### 依赖库 rabbitmq-c

### php扩展包 amqp

https://blog.csdn.net/a454213722/article/details/51870858

## 概要

我们先大致了解一下rabbitmq，简单的说就是一个生产者-消费者模式的消息队列，支持消息持久化。同时需要了解几个名词，以及这几个名词之间的联系

* 生产者（producer）
* 信道（channel）
* 消息交换机(exchange)
* 消息队列(queue)
* 消费者(consumer)
* 路由关键词

### 工作流程

生产者产生的消息通过信道投递到某个消息交换机上，投递过程中指定了一个路由关键字，消息交换机将这条消息投递到不同的消息队列中的时候，依据路由关键字，该消息可能会被投递到某一个或者某几个符合路由规则的消息队列中，消费者从消息队列中取出消息进行后一步处理。

### 分发机制

当多个消费者同时在消费同一个消息队列的时候，rabbitmq会顺序分发队列中message，当每个message收到ack，就会将这条消息从消息队列中删除，这种分发的机制叫做round-robin。

## Demo

构造一个生产者，并投递一条消息到rabbitmq中。

```php
$conn_args = array(
        'host'=>'127.0.0.1',  //rabbitmq 服务器host
        'port'=>5672,         //rabbitmq 服务器端口
        'login'=>'guest',     //登录用户
        'password'=>'guest',   //登录密码
        'vhost'=>'/'         //虚拟主机
    );
$e_name = 'e_demo';
$q_name = 'q_demo';
$k_route = 'key_1';

$conn = new AMQPConnection($conn_args);
if(!$conn->connect()){
    die('Cannot connect to the broker');
}
$channel = new AMQPChannel($conn);

$ex = new AMQPExchange($channel);
$ex->setName($e_name);
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);
$status = $ex->declareExchange();  //声明一个新交换机，如果这个交换机已经存在了，就不需要再调用declareExchange()方法了.
$q = new AMQPQueue($channel);
$q->setName($q_name);
$status = $q->declareQueue(); //同理如果该队列已经存在不用再调用这个方法了。
$ex->publish($msg, $k_route);
```

构建了一个消费者，并从消息队列中拿出一条消息，并把该消息从队列中移除。

```php
$conn_args = array(
        'host'=>'127.0.0.1',
        'port'=>5672,
        'login'=>'guest',
        'password'=>'guest',
        'vhost'=>'/'
    );
$e_name = 'e_demo';
$q_name = 'q_demo';
$k_route = 'key_1';


$conn = new AMQPConnection($conn_args);
if(!$conn->connect()){
    die('Cannot connect to the broker');
}
$channel = new AMQPChannel($conn);
$ex = new AMQPExchange($channel);
$ex->setName($e_name);
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);

$q = new AMQPQueue($channel);
var_dump($q);
$q->setName($q_name);
$q->bind($e_name, $k_route);

$arr = $q->get();
var_dump($arr);
$res = $q->ack($arr->getDeliveryTag());
$msg = $arr->getBody();
var_dump($msg);
```

## 补充

补充说明一下rabbitmq的使用命令 
rabbitmq-server start是启动rabbitmq服务。 
主要的管理rabbitmq使用的是rabbitctl命令

rabbitmqctl start_app 启动rabbitmq
rabbitmqctl stop_app 关闭rabbitmq
rabbitmqctl reset 重置rabbitmq队列
rabbitmqctl list_queues 查看rabbitmq中队列
rabbitmqctl list_exchanges 查看rabbitmq中的交换机

## 一、核心概念及术语

1、AMQP：Advanced Message Queuing Protocol，是一个提供统一消息服务的应用层标准协议。

从 AMQP 协议可以看出，Queue、Exchange 和 Binding 构成了 AMQP 协议的核心:

* Producer：消息生产者，即投递消息的程序。
* Broker：消息队列服务器实体。
    * Exchange：消息交换机，它指定消息按什么规则，路由到哪个队列。
    * Binding：绑定，它的作用就是把 Exchange 和 Queue 按照路由规则绑定起来。
    * Queue：消息队列载体，每个消息都会被投入到一个或多个队列。
* Consumer：消息消费者，即接受消息的程序。

2、IPC（单一系统进程间通信） -> socket（不同机器间进程通信） -> AMQP（解决大型系统模块与组件间通信）

3、RabbitMQ 基于 Erlang 开发，是 AMQP 的一个开源实现。

ConnectionFactory、Connection、Channel都是RabbitMQ对外提供的API中最基本的对象。

* Connection，是RabbitMQ的socket链接，它封装了socket协议相关部分逻辑。
* ConnectionFactory，如名称，是客户端与broker的tcp连接工厂，负责根据uri创建Connection。
* Channel，是我们与RabbitMQ打交道的最重要的一个接口，我们大部分的业务操作是在Channel这个接口中完成的，包括定义Queue、定义Exchange、绑定Queue与Exchange、发布消息等。如果每一次访问RabbitMQ都建立一个Connection，在消息量大的时候建立TCP Connection的开销将是巨大的，效率也较低。Channel是在connection内部建立的逻辑连接，如果应用程序支持多线程，通常每个thread创建单独的channel进行通讯，AMQP method包含了channel id帮助客户端和message broker识别channel，所以channel之间是完全隔离的。Channel作为轻量级的Connection极大减少了操作系统建立TCP connection的开销。


4、RabbitMQ 系统架构图：

￼![RabbitMQ系统架构图][p1]

RabbitMQ系统架构图

5、名词术语：

* RabbitMQ Server（broker server）：维护一条从 Producer 到 Consumer 的路线，保证数据能够按照指定的方式进行传输；
* Client A & B：数据发送方，Producers create messages and publish (send) them to a broker server (RabbitMQ)，一个有效的 Message 包含 payload 和 label 两部分
* Client 1、2、3：数据消费方，Consumers attach to a broker server (RabbitMQ) and subscribe to a queue
* Exchange：Exchanges are where producers publish their messages
* Queue： Queues are where the messages end up and are received by consumers
* Binding：Bindings are how the messages get routed from the exchange to particular queues

还有几个隐式的概念：

* Connection：Producer 和 Consumer 通过 TCP 连接到 RabbitMQ
* Channel：它建立在上述的 TCP 连接中，数据流动都是在 Channel 中进行的

此外，Exchanges 分三种类型：

* direct：如果 routing key 匹配，那么 Message 就会被传递到相应的 queue
* fanout：会向响应的 queue 广播
* topic：对 key 进行模式匹配，比如 `ab*` 可以传递到所有 `ab*` 的 queue

## 二、搭建 PHP 开发环境

1、安装 RabbitMQ：

```bash
brew install rabbitmq
```

2、接下来安装 rabbitmq-c，C 与 RabbitMQ 通信需要依赖这个库：

```bash
git clone git://github.com/alanxz/rabbitmq-c.git  
cd rabbitmq-c
mkdir build  && cd build  
cmake -DCMAKE_INSTALL_PREFIX=/usr/local ..  
cmake --build . --target install
```

注：这块安装过程中可能报错比较多。

3、安装对应的 PHP 扩展：

```bash
wget http://pecl.php.net/get/amqp-1.9.1.tgz
tar zvxf amqp-1.9.1.tgz
cd amqp-1.9.1
phpize
./configure --with-amqp
make && make install
```

4、最后将 extension=amqp.so 放到 php.ini，然后检测是否安装成功：

```bash
php -i | grep amqp
```

## 三、PHP 中实现消息发送和接收

send.php

```php
<?php
/**
 * 发送消息
 */

$exchangeName = 'demo';
$routeKey = 'hello';
$message = 'Hello World!';

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

try {
    $channel = new AMQPChannel($connection);

    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_DIRECT);
    $exchange->declareExchange();

    echo 'Send Message: ' . $exchange->publish($message, $routeKey) . "\n";
    echo "Message Is Sent: " . $message . "\n";
} catch (AMQPConnectionException $e) {
    var_dump($e);
}

// 断开连接
$connection->disconnect();
```

receive.php

```php
<?php
/**
 * 接收消息
 */

$exchangeName = 'demo';
$queueName = 'hello';
$routeKey = 'hello';

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_DIRECT);

echo 'Exchange Status: ' . $exchange->declareExchange() . "\n";

$queue = new AMQPQueue($channel);
$queue->setName($queueName);

echo 'Message Total: ' . $queue->declareQueue() . "\n";

echo 'Queue Bind: ' . $queue->bind($exchangeName, $routeKey) . "\n";

var_dump("Waiting for message...");

// 消费队列消息
while(TRUE) {
    $queue->consume('processMessage');
}

// 断开连接
$connection->disconnect();

function processMessage($envelope, $queue) {
    $msg = $envelope->getBody();
    var_dump("Received: " . $msg);
    $queue->ack($envelope->getDeliveryTag()); // 手动发送ACK应答
}
```

测试：打开两个终端，先运行接收者脚本监听消息发送：`php receive.php`，在另一个终端中运行消息发送脚本：`php send.php`，然后会在消费者终端中看到消息被接收并打印出来。

## 四、消息分发机制

对于计算密集型任务，需要将其分发给多个消费者进行处理。

### 4.1、准备工作

我们对前面测试的代码稍作改造：

task.php

```php
<?php
/**
 * 分发任务
 */

$exchangeName = 'task';
$queueName = 'worker';
$routeKey = 'worker';
$message = empty($argv[1]) ? 'Hello World!' : $argv[1];

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

try {
    $channel = new AMQPChannel($connection);

    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_DIRECT);
    $exchange->declareExchange();

    echo 'Send Message: ' . $exchange->publish($message, $routeKey) . "\n";
    echo "Message Is Sent: " . $message . "\n";
} catch (AMQPConnectionException $e) {
    var_dump($e);
}

// 断开连接
$connection->disconnect();
```

worker.php

```php
<?php
/**
 * 处理任务
 */

$exchangeName = 'task';
$queueName = 'worker';
$routeKey = 'worker';

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_DIRECT);

echo 'Exchange Status: ' . $exchange->declareExchange() . "\n";

$queue = new AMQPQueue($channel);
$queue->setName($queueName);

echo 'Message Total: ' . $queue->declareQueue() . "\n";

echo 'Queue Bind: ' . $queue->bind($exchangeName, $routeKey) . "\n";

var_dump("Waiting for message...");

// 消费队列消息
while(TRUE) {
    $queue->consume('processMessage');
}

// 断开连接
$connection->disconnect();

function processMessage($envelope, $queue) {
    $msg = $envelope->getBody();
    var_dump("Received: " . $msg);
    sleep(substr_count($msg, '.')); // 为每一个点号模拟1秒钟操作
    $queue->ack($envelope->getDeliveryTag()); // 手动发送ACK应答
}
```

### 4.2、Round-robin dispatch 轮询分发

打开两个终端，分别运行 `php worker.php` ，然后再开一个终端进行任务分发 `php task.php` ：

￼![task窗口][p2]

会发现任务会依次发送两个任务消费者进行处理：

第一个任务窗口

￼￼![worker窗口1][p3]

第二个任务窗口

￼￼￼![worker窗口2][p4]

### 4.3、消息确认

每个 Consumer 可能需要一段时间才能处理完收到的数据。如果在这个过程中，Consumer 出错或异常退出，而数据还没有处理完成，那么这段数据就丢失了。因为我们采用 no-ack 的方式进行确认，也就是说，每次 Consumer 接到数据后，不管是否处理完成，RabbitMQ Server 会立即把这个 Message 标记为完成，然后从 Queue 中删除。

为了保证数据不被丢失，RabbitMQ 支持消息确认机制，这种机制下不能采用 no-ack，而应该是在处理完数据后发送 ack。如果处理中途 Consumer 退出了，但是没有发送 ack，那么 RabbitMQ 就会把这个 Message 发送到下一个 Consumer，这样就保证了在 Consumer 异常退出的情况下数据也不会丢失。

这里并没有用到超时机制，RabbitMQ 仅仅通过 Consumer 的连接中断来确认该 Message 并没有被正确处理，也就是说，RabbitMQ 给 Consumer 足够长的时间来做数据处理。

之前的例子中，我们在代码中使用了 `$queue->ack($envelope->getDeliveryTag());` ，这就是消息确认机制的应用，这种情况下，即使中断任务执行，也不会影响 RabbitMQ 中消息的处理，RabbitMQ 会将其发送给下一个 Consumer 进行处理。

如果忘记了 ack，那么后果很严重。当 Consumer 退出时，Message 会重新分发。然后 RabbitMQ 会占用越来越多的内存，由于 RabbitMQ 会长时间运行，因此这个“内存泄漏”是致命的。针对这行场景，可以通过以下命令进行 debug：

```bash
sudo rabbitmqctl list_queues name messages_ready messages_unacknowledged
```

### 4.4、消息持久化

为了保证在 RabbitMQ 退出或者 crash 了数据不丢失，需要将 Queue 和 Message 持久化。

Exchange 的持久化：

```php
$exchange->setFlags(AMQP_DURABLE);
```

Queue 的持久化：

```php
$queue->setFlags(AMQP_DURABLE);
```

### 4.5、Fair dispatch 公平分发

轮询的弊病：依次分发，周而复始，在某些 Consumer 负载很重的时候，还是会分发给它。

我们可以使用 `$channel->setPrefetchCount()` 方法，并设置 `prefetch_count = 1` 。这样是告诉 RabbitMQ，在同一时刻，不要发送超过 1 条消息给一个工作者（worker），直到它已经处理了上一条消息并且作出了响应。这样，RabbitMQ 就会把消息分发给下一个空闲的工作者（worker）。

## 五、消息订阅（Publish/Subscribe）

之前都是将消息发送到同一个 Consumer，而现在我们需将其发送到多个 Consumer。

我们将创建一个日志系统，它包含两个部分：第一个部分负责发出log（Producer），第二个部分负责接收并打印（Consumer）。我们将构建两个 Consumer，第一个将 log 写到物理磁盘上；第二个将 log 输出到屏幕。

> “Fanout” not telling an exchange to distribute messages to different consumers, but to different queues. So, you need at least two queues binding to a “fanout” exchange. Then let your two consumers get message from those two queues, one consumer to one queue.

Exchange
Exchange 决定将 Message 发送到具体的 Queue，至于是发送给一个 Queue 还是多个 Queue，则需要通过 Exchange 的类型类决定。Exchange 分为三种类型：direct、topic 和 fanout。fanout 就是广播模式，会将 Message 都放到它所知道的所有 Queue 中：

$exchange->setType(AMQP_EX_TYPE_FANOUT);
现在我们可以直接通过 Exchange，而不需要 routing_key 来发送 Message 了：

$exchange->publish($message);
临时队列
截至现在，我们用的 Queue 都是有名字的。使用有名字的 Queue，使得在 Producer 和 Consumer 之前共享 Queue 成为可能。

在我们的日志系统中，不需要有名字的队列，要实现这个目标，需要在声明队列时不指定名称，而由系统随机分配：

$queue = new AMQPQueue($channel);
//$queue->setName($queueName);
$queue->setFlags(AMQP_EXCLUSIVE);
$queue->declareQueue();
//$queue->bind($exchangeName, $routeKey);
这时，通过 $queue->getName() 获取到的队列名称是随机生成的。

绑定
建立 Exchange 与 Queue 之间的绑定：

$queue->bind($exchangeName);
演示代码
emit_logs.php

```php
<?php
/**
 * 发送消息
 */

$exchangeName = 'logs';
$message = 'Hello World!';

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

try {
    $channel = new AMQPChannel($connection);

    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_FANOUT);
    $exchange->declareExchange();

    echo 'Send Message: ' . $exchange->publish($message) . "\n";
    echo "Message Is Sent: " . $message . "\n";
} catch (AMQPConnectionException $e) {
    var_dump($e);
}

// 断开连接
$connection->disconnect();
```

receive_logs.php

```php
<?php
/**
 * 接收消息
 */

$exchangeName = 'logs';

// 建立TCP连接
$connection = new AMQPConnection([
    'host' => 'localhost',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
]);
$connection->connect() or die("Cannot connect to the broker!\n");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_FANOUT);
$exchange->declareExchange();

$queue = new AMQPQueue($channel);
$queue->setFlags(AMQP_EXCLUSIVE);
$queue->declareQueue();
$queue->bind($exchangeName);

var_dump("Waiting for message...");

// 消费队列消息
while(TRUE) {
    $queue->consume('processMessage');
}

// 断开连接
$connection->disconnect();

function processMessage($envelope, $queue) {
    $msg = $envelope->getBody();
    var_dump("Received: " . $msg);
    $queue->ack($envelope->getDeliveryTag()); // 手动发送ACK应答
}
```

演示流程

打开两个终端，一个消费者队列负责将日志写入文件：

php receive_logs.php > logs_from_rabbit.log
一个负责将日志输出到屏幕：

php receive_logs.php
然后再打开一个终端，将日志信息发送到所有队列：

php emit_logs.php
这样，会发现所有队列会同时接收到日志并进行相应的处理。


## Laravel

* [laravel-rabbitmq](http://laravelacademy.org/tags/rabbitmq)

[p1]: ./dist/img/20180629-1.jpg
[p2]: ./dist/img/20180629-2.jpg
[p3]: ./dist/img/20180629-3.jpg
[p4]: ./dist/img/20180629-4.jpg