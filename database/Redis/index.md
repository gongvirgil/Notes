# Redis

## 安装Redis

* [安装Redis](./../Redis.md)
* 启动Redis服务:   redis-server –port 6379
* 查看Redis服务是否启动: redis-cli -h 127.0.0.1 -p 6379 PING
* 查看Redis版本: 
	* redis-server -v 
	* redis-cli -v 
* 启动Redis客户端: redis-cli -h 127.0.0.1 -p 6379

## 基础操作

* `KEYS`
	* KEYS *