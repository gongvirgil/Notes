# Redis

## 安装Redis

* [安装Redis](./../Redis.md)
* 启动Redis服务:   redis-server --port 6379
* 查看Redis服务是否启动: redis-cli -h 127.0.0.1 -p 6379 PING
* 查看Redis版本: 
	* redis-server -v 
	* redis-cli -v 
* 启动Redis客户端: redis-cli -h 127.0.0.1 -p 6379

## 基础操作

* select `index` : 选择到0数据库 redis默认的数据库是0~15一共16个数据库
* move `key` `index` : 将当前数据库中的key移动到目标数据库中
* ping PONG返回响应是否连接成功
* echo 在命令行打印一些内容
* select 0~15 编号的数据库
* quit  /exit 退出客户端
* dbsize 返回当前数据库中所有key的数量
* info 返回redis的相关信息
* config get dir/* 实时传储收到的请求
* flushdb 删除当前选择数据库中的所有key
* flushall 删除所有数据库中的数据库

### 键(key)

* del `key` : 该命令用于在 key 存在时删除 key。
* dump `key`  : 序列化给定 key ，并返回被序列化的值。
* exists `key`  : 检查给定 key 是否存在。
* expire `key` `seconds` : 为给定 key 设置过期时间。
* expireat `key` `timestamp`  : expireat 的作用和 expire 类似，都用于为 key 设置过期时间。 不同在于 expireat 命令接受的时间参数是 unix 时间戳(unix timestamp)。
* pexpire `key` `milliseconds`  : 设置 key 的过期时间以毫秒计。
* pexpireat `key` `milliseconds-timestamp`  : 设置 key 过期时间的时间戳(unix timestamp) 以毫秒计
* keys `pattern`  : 查找所有符合给定模式( pattern)的 key 。
	* keys *
	* keys ?
	* keys []
* move `key` `db`  : 将当前数据库的 key 移动到给定的数据库 db 当中。
* persist `key`  : 移除 key 的过期时间，key 将持久保持。
* pttl `key`  : 以毫秒为单位返回 key 的剩余的过期时间。
* ttl `key`  : 以秒为单位，返回给定 key 的剩余生存时间(ttl, time to live)。
* randomkey  : 从当前数据库中随机返回一个 key 。
* rename `key` `newkey`  : 修改 key 的名称
* renamenx `key` `newkey`  : 仅当 newkey 不存在时，将 key 改名为 newkey 。
* type `key`  : 返回 key 所储存的值的类型。

### 字符串(String)

* set `key` `value` : 设置指定 key 的值
* get `key` : 获取指定 key 的值。
* getrange `key` `start` `end` : 返回 key 中字符串值的子字符
* getset `key` `value` : 将给定 key 的值设为 value ，并返回 key 的旧值(old value)。
* getbit `key` `offse` : 对 key 所储存的字符串值，获取指定偏移量上的位(bit)。
* mget `key1` `key2` : 获取所有(一个或多个)给定 key 的值。
* setbit `key` `offset` `value` : 对 key 所储存的字符串值，设置或清除指定偏移量上的位(bit)。
* setex `key` `seconds` `value` : 将值 value 关联到 key ，并将 key 的过期时间设为 seconds (以秒为单位)。
* setnx `key` `value` : 只有在 key 不存在时设置 key 的值。
* setrange `key` `offset` `value` : 用 value 参数覆写给定 key 所储存的字符串值，从偏移量 offset 开始。
* strlen `key` : 返回 key 所储存的字符串值的长度。
* mset `key1` `value1` `key2` `value2` : 同时设置一个或多个 key-value 对。
* msetnx `key1` `value1` `key2` `value2` : 同时设置一个或多个 key-value 对，当且仅当所有给定 key 都不存在。
* psetex `key` `milliseconds` `value` : 这个命令和 setex 命令相似，但它以毫秒为单位设置 key 的生存时间，而不是像 setex 命令那样，以秒为单位。
* incr `key` : 将 key 中储存的数字值增一。
* incrby `key` `incremen` : 将 key 所储存的值加上给定的增量值（increment） 。
* incrbyfloat `key` `incremen` : 将 key 所储存的值加上给定的浮点增量值（increment） 。
* decr `key` : 将 key 中储存的数字值减一。
* decrby `key` `decrement` : key 所储存的值减去给定的减量值（decrement） 。
* append `key` `value` : 如果 key 已经存在并且是一个字符串， append 命令将 value 追加到 key 原来的值的末尾。

### 哈希(Hash)

* hdel `key` `field1` `field2` : 删除一个或多个哈希表字段
* hexists `key` `field` : 查看哈希表 key 中，指定的字段是否存在。
* hget `key` `field` : 获取存储在哈希表中指定字段的值。
* hgetall `key` : 获取在哈希表中指定 key 的所有字段和值
* hincrby `key` `field` `increment` : 为哈希表 key 中的指定字段的整数值加上增量 increment 。
* hincrbyfloat `key` `field` `increment` : 为哈希表 key 中的指定字段的浮点数值加上增量 increment 。
* hkeys `key` : 获取所有哈希表中的字段
* hlen `key` : 获取哈希表中字段的数量
* hmget `key` `field1` `field2` : 获取所有给定字段的值
* hmset `key` `field1` `value1` `field2` `valuen2` : 同时将多个 field-value (域-值)对设置到哈希表 key 中。
* hset `key` `field` `value` : 将哈希表 key 中的字段 field 的值设为 value 。
* hsetnx `key` `field` `value` : 只有在字段 field 不存在时，设置哈希表字段的值。
* hvals `key` : 获取哈希表中所有值
* hscan `key` cursor [match pattern] [count count] : 迭代哈希表中的键值对。

### 列表(List)

* blpop key1 [key2 ] timeout : 移出并获取列表的第一个元素， 如果列表没有元素会阻塞列表直到等待超时或发现可弹出元素为止。
* brpop key1 [key2 ] timeout : 移出并获取列表的最后一个元素， 如果列表没有元素会阻塞列表直到等待超时或发现可弹出元素为止。
* brpoplpush source destination timeout : 从列表中弹出一个值，将弹出的元素插入到另外一个列表中并返回它；如果列表没有元素会阻塞列表直到等待超时或发现可弹出元素为止。
* lindex key index : 通过索引获取列表中的元素
* linsert key before|after pivot value : 在列表的元素前或者后插入元素
* llen key : 获取列表长度
* lpop key : 移出并获取列表的第一个元素
* lpush key value1 [value2] : 将一个或多个值插入到列表头部
* lpushx key value : 将一个值插入到已存在的列表头部
* lrange key start stop : 获取列表指定范围内的元素
* lrem key count value : 移除列表元素
* lset key index value : 通过索引设置列表元素的值
* ltrim key start stop : 对一个列表进行修剪(trim)，就是说，让列表只保留指定区间内的元素，不在指定区间之内的元素都将被删除。
* rpop key : 移除并获取列表最后一个元素
* rpoplpush source destination : 移除列表的最后一个元素，并将该元素添加到另一个列表并返回
* rpush key value1 [value2] : 在列表中添加一个或多个值
* rpushx key value : 为已存在的列表添加值

### 集合(Set)

* sadd key member1 [member2]  : 向集合添加一个或多个成员
* scard key  : 获取集合的成员数
* sdiff key1 [key2]  : 返回给定所有集合的差集
* sdiffstore destination key1 [key2]  : 返回给定所有集合的差集并存储在 destination 中
* sinter key1 [key2]  : 返回给定所有集合的交集
* sinterstore destination key1 [key2]  : 返回给定所有集合的交集并存储在 destination 中
* sismember key member  : 判断 member 元素是否是集合 key 的成员
* smembers key  : 返回集合中的所有成员
* smove source destination member  : 将 member 元素从 source 集合移动到 destination 集合
* spop key  : 移除并返回集合中的一个随机元素
* srandmember key [count]  : 返回集合中一个或多个随机数
* srem key member1 [member2]  : 移除集合中一个或多个成员
* sunion key1 [key2]  : 返回所有给定集合的并集
* sunionstore destination key1 [key2]  : 所有给定集合的并集存储在 destination 集合中
* sscan key cursor [match pattern] [count count]  : 迭代集合中的元素

### 有序集合(sorted set)

* zadd key score1 member1 [score2 member2]  : 向有序集合添加一个或多个成员，或者更新已存在成员的分数
* zcard key  : 获取有序集合的成员数
* zcount key min max  : 计算在有序集合中指定区间分数的成员数
* zincrby key increment member  : 有序集合中对指定成员的分数加上增量 increment
* zinterstore destination numkeys key [key ...]  : 计算给定的一个或多个有序集的交集并将结果集存储在新的有序集合 key 中
* zlexcount key min max  : 在有序集合中计算指定字典区间内成员数量
* zrange key start stop [withscores]  : 通过索引区间返回有序集合成指定区间内的成员
* zrangebylex key min max [limit offset count]  : 通过字典区间返回有序集合的成员
* zrangebyscore key min max [withscores] [limit]  : 通过分数返回有序集合指定区间内的成员
* zrank key member  : 返回有序集合中指定成员的索引
* zrem key member [member ...]  : 移除有序集合中的一个或多个成员
* zremrangebylex key min max  : 移除有序集合中给定的字典区间的所有成员
* zremrangebyrank key start stop  : 移除有序集合中给定的排名区间的所有成员
* zremrangebyscore key min max  : 移除有序集合中给定的分数区间的所有成员
* zrevrange key start stop [withscores]  : 返回有序集中指定区间内的成员，通过索引，分数从高到底
* zrevrangebyscore key max min [withscores]  : 返回有序集中指定分数区间内的成员，分数从高到低排序
* zrevrank key member  : 返回有序集合中指定成员的排名，有序集成员按分数值递减(从大到小)排序
* zscore key member  : 返回有序集中，成员的分数值
* zunionstore destination numkeys key [key ...]  : 计算给定的一个或多个有序集的并集，并存储在新的 key 中
* zscan key cursor [match pattern] [count count]  : 迭代有序集合中的元素（包括元素成员和元素分值）

## 事务

1. MULTI
用于标记事务块的开始。Redis会将后续的命令逐个放入队列中，然后才能使用EXEC命令原子化地执行这个命令序列。

这个命令的运行格式如下所示：

MULTI

这个命令的返回值是一个简单的字符串，总是OK。

2. EXEC
在一个事务中执行所有先前放入队列的命令，然后恢复正常的连接状态。

当使用WATCH命令时，只有当受监控的键没有被修改时，EXEC命令才会执行事务中的命令，这种方式利用了检查再设置（CAS）的机制。

这个命令的运行格式如下所示：

EXEC

这个命令的返回值是一个数组，其中的每个元素分别是原子化事务中的每个命令的返回值。 当使用WATCH命令时，如果事务执行中止，那么EXEC命令就会返回一个Null值。

3. DISCARD
清除所有先前在一个事务中放入队列的命令，然后恢复正常的连接状态。

如果使用了WATCH命令，那么DISCARD命令就会将当前连接监控的所有键取消监控。

这个命令的运行格式如下所示：

DISCARD
这个命令的返回值是一个简单的字符串，总是OK。

4. WATCH
当某个事务需要按条件执行时，就要使用这个命令将给定的键设置为受监控的。

这个命令的运行格式如下所示：

WATCH key [key ...]
这个命令的返回值是一个简单的字符串，总是OK。

对于每个键来说，时间复杂度总是O(1)。

5. UNWATCH
清除所有先前为一个事务监控的键。

如果你调用了EXEC或DISCARD命令，那么就不需要手动调用UNWATCH命令。

这个命令的运行格式如下所示：

UNWATCH
这个命令的返回值是一个简单的字符串，总是OK。

时间复杂度总是O(1)。
