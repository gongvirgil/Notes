# php 使用kafka

一、安装

1.1、安装librdkafka 库

```sh
git clone https://github.com/edenhill/librdkafka.git
 ./configure
 make
 sudo make install
```

1.2、安装php-rdkafka 扩展

```sh
$ git clone https://github.com/arnaud-lb/php-rdkafka.git

#生成configure文件
$ /Users/shiyibo/LNMP/php/bin/phpize

#编译安装
$ ./configure --with-php-config=/Users/shiyibo/LNMP/php/bin/php-config
$ make
$ make install

#在php.ini 文件中配置 rdkafka扩展
$ vim /Users/shiyibo/LNMP/php/etc/php.ini
extension=rdkafka.so

#查看扩展是否生效
$php -m | grep kafka
```

二、编码实现

2.1、生产者

```php
<?php
/**
 * 消息生产者
 *
 * 实现的例子来源于：
 *
 * https://github.com/arnaud-lb/php-rdkafka#examples
 */

$objRdKafka = new RdKafka\Producer();
$objRdKafka->setLogLevel(LOG_DEBUG);
$objRdKafka->addBrokers("localhost:9092");

$oObjTopic = $objRdKafka->newTopic("test");

// 从终端接收输入 
$oInputHandler = fopen('php://stdin', 'r');

while (true) {
    echo "\nEnter  messages:\n";
    $sMsg = trim(fgets($oInputHandler));

   // 空消息意味着退出
    if (empty($sMsg)) {
        break;
    }

    // 发送消息
    $oObjTopic->produce(RD_KAFKA_PARTITION_UA, 0, $sMsg);
}

echo "done\n";
```

2.2、消费者

```php
<?php

/**
 * 消费者消费消息
 *
 * 实现的例子来源于：
 *
 * https://github.com/arnaud-lb/php-rdkafka#examples
 */

$objRdKafka = new RdKafka\Consumer();
$objRdKafka->setLogLevel(LOG_DEBUG);
$objRdKafka->addBrokers("localhost:9092");

$oObjTopic = $objRdKafka->newTopic("test");

/**
 * consumeStart
 *   第一个参数标识分区，生产者是往分区0发送的消息，这里也从分区0拉取消息
 *   第二个参数标识从什么位置开始拉取消息，可选值为
 *     RD_KAFKA_OFFSET_BEGINNING : 从开始拉取消息
 *     RD_KAFKA_OFFSET_END : 从当前位置开始拉取消息
 *     RD_KAFKA_OFFSET_STORED : 猜测跟RD_KAFKA_OFFSET_END一样
 */
$oObjTopic->consumeStart(0, RD_KAFKA_OFFSET_END);

while (true) {
    // 第一个参数是分区，第二个参数是超时时间
    $oMsg = $oObjTopic->consume(0, 1000);

    // 没拉取到消息时，返回NULL
    if (!$oMsg) {
        usleep(10000);
        continue;
    }

    if ($oMsg->err) {
        echo $msg->errstr(), "\n";
        break;
    } else {
        echo $oMsg->payload, "\n";
    }
}
```


```sh
# 因为生产者会往test的topic中发送消息，消费者直接消费test即可
kafka-console-consumer --bootstrap-server localhost:9092 --topic test
```