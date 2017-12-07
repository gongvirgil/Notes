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

* `SELECT` 命令用于切换到指定的数据库，数据库索引号 index 用数字值指定，以 0 作为起始索引值。

```
	redis 127.0.0.1:6379> SELECT index 
	redis 127.0.0.1:6379> SET db_number 0         # 默认使用 0 号数据库
	OK
	redis 127.0.0.1:6379> SELECT 1                # 使用 1 号数据库
	OK
	redis 127.0.0.1:6379[1]> GET db_number        # 已经切换到 1 号数据库，注意 Redis 现在的命令提示符多了个 [1]
	(nil)
	redis 127.0.0.1:6379[1]> SET db_number 1
	OK
	redis 127.0.0.1:6379[1]> GET db_number
	"1"
	redis 127.0.0.1:6379[1]> SELECT 3             # 再切换到 3 号数据库
	OK
	redis 127.0.0.1:6379[3]>                      # 提示符从 [1] 改变成了 [3]
```