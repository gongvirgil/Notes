# PHP框架

* 统一入口文件
* composer自动加载
* 启动器
* 路由
* 参数验证器



## 入口文件

public/index.php
public/shell.php

## git支持

.git
.gitignore

## composer支持

composer.json

## 配置文件

config/

## 命名空间

app/

composer自动加载命名空间

## 自动加载

### 启动器

bootstrap/app.php

## 路由

推荐 https://github.com/NoahBuscher/Macaw，对应的 Composer 包为 noahbuscher/macaw 。

## VIEW层

### ob函数

## 全局常量和全局类

## 数据库

### Eloquent ORM

illuminate/database
https://laravel.com/docs/master/eloquent
https://learnku.com/docs/laravel/7.x/eloquent/7499

## 异常处理

filp/whoops 错误提示组件包。

## 邮件服务

nette/mail
http://doc.nette.org/en/2.2/mailing

## Redis服务

1. 安装 PHP 的 Redis 扩展。
2. 使用 nrk/predis 包。

redis官方推荐的php客户端是predis和phpredis。前者是完全使用php代码实现的原生客户端，后者则是用c编写的php拓展。在功能上二者区别不大，就性能而言后者更胜一筹。

虽然predis的性能逊于phpredis，但除非执行大量的redis命令，否则很难区分二者的性能。而且实际应用中执行redis的命令的开销更多在网络传输上，单纯注重客户端的性能的意义不大。

——摘自《redis入门指南》第五章

## 表单处理

Request

### 参数验证器validation

composer require webgeeker/validation:^0.5.2

https://github.com/photondragon/webgeeker-validation

## 中间件

Middleware

## Event 组件

## Polices（策略）

## 日志组件

Seldaek/monolog