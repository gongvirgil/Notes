# Redis

* [redis](http://www.runoob.com/redis/redis-tutorial.html)

## 使用场景

* String
    * 计数器应用
* List
    * 取最新N个数据的操作
    * 消息队列
    * 删除与过滤
    * 实时分析正在发生的情况，用于数据统计与防止垃圾邮件（结合Set）
* Set
    * Uniqe操作，获取某段时间所有数据排重值
    * 实时系统，反垃圾系统
    * 共同好友、二度好友
    * 利用唯一性，可以统计访问网站的所有独立 IP
    * 好友推荐的时候，根据 tag 求交集，大于某个 threshold 就可以推荐
* Hashes
    * 存储、读取、修改用户属性
* Sorted Set
    * 排行榜应用，取TOP N操作
    * 需要精准设定过期时间的应用（时间戳作为Score）
    * 带有权重的元素，比如一个游戏的用户得分排行榜
    * 过期项目处理，按照时间排序
* Redis解决秒杀/抢红包等高并发事务活动

> 秒杀开始前30分钟把秒杀库存从数据库同步到Redis Sorted Set
> 用户秒杀库存放入秒杀限制数长度的Sorted Set
> 秒杀到指定秒杀数后，Sorted Set不在接受秒杀请求，并显示返回标识
> 秒杀活动完全结束后，同步Redis数据到数据库，秒杀正式结束


## 安装

* [](http://professor.blog.51cto.com/996189/1851370)

### 安装Redis

    //下载安装包
    wget http://download.redis.io/releases/redis-3.2.6.tar.gz
    tar xzf redis-3.2.6.tar.gz
    cd redis-3.2.6
    //编译源程序
    make 
    cd src
    make install PREFIX=/usr/local/redis
    //移动配置文件到redis目录
    mv redis-3.2.6/redis.conf /usr/local/redis/etc/redis.conf
    //启动redis服务
    /usr/local/redis/bin/redis-server /usr/local/redis/etc/redis.conf
    //后台运行redis
    vim /usr/local/redis/etc/redis.conf //将daemonize的值改为yes
    //客户端连接
        /usr/local/redis/bin/redis-cli 
    //停止redis实例
    /usr/local/redis/bin/redis-cli shutdown //或 kill redis-server
    //redis开机自启
    　　vim /etc/rc.local //加入/usr/local/redis/bin/redis-server /usr/local/redis/etc/redis.conf

bin目录下的几个文件：

* redis-benchmark：redis性能测试工具
* redis-check-aof：检查aof日志的工具
* redis-check-dump：检查rdb日志的工具
* redis-cli：连接用的客户端
* redis-server：redis服务进程

### 安装php-redis扩展

    //若`/usr/bin/phpize`不存在时，先安装phpize
    apt-get install php5-dev

    //下载扩展包
    wget https://github.com/phpredis/phpredis/archive/2.2.4.tar.gz
    tar xzf 2.2.4.tar.gz
    cd phpredis-2.2.4
    //php安装后的路径
    /usr/bin/phpize             
    ./configure --with-php-config=/usr/bin/php-config
    make && make install
    //修改php.ini或新建/etc/php5/apache2/conf.d/redis.ini
    vi /etc/php5/apache2/php.ini
    vi /etc/php5/cli/php.ini
    //加入
    extension_dir="/usr/lib/php5/20090626/"
    extension=redis.so
    //重启php-fpm 或 apache。查看phpinfo信息，就能看到redis扩展。

## 配置

Redis的配置

　　daemonize：如需要在后台运行，把该项的值改为yes
　　pdifile：把pid文件放在/var/run/redis.pid，可以配置到其他地址
　　bind：指定redis只接收来自该IP的请求，如果不设置，那么将处理所有请求，在生产环节中最好设置该项
　　port：监听端口，默认为6379
　　timeout：设置客户端连接时的超时时间，单位为秒
　　loglevel：等级分为4级，debug，revbose，notice和warning。生产环境下一般开启notice
　　logfile：配置log文件地址，默认使用标准输出，即打印在命令行终端的端口上
　　database：设置数据库的个数，默认使用的数据库是0
　　save：设置redis进行数据库镜像的频率
　　rdbcompression：在进行镜像备份时，是否进行压缩
　　dbfilename：镜像备份文件的文件名
　　dir：数据库镜像备份的文件放置的路径
　　slaveof：设置该数据库为其他数据库的从数据库
　　masterauth：当主数据库连接需要密码验证时，在这里设定
　　requirepass：设置客户端连接后进行任何其他指定前需要使用的密码
　　maxclients：限制同时连接的客户端数量
　　maxmemory：设置redis能够使用的最大内存
　　appendonly：开启appendonly模式后，redis会把每一次所接收到的写操作都追加到appendonly.aof文件中，当redis重新启动时，会从该文件恢复出之前的状态
　　appendfsync：设置appendonly.aof文件进行同步的频率
　　vm_enabled：是否开启虚拟内存支持
　　vm_swap_file：设置虚拟内存的交换文件的路径
　　vm_max_momery：设置开启虚拟内存后，redis将使用的最大物理内存的大小，默认为0
　　vm_page_size：设置虚拟内存页的大小
　　vm_pages：设置交换文件的总的page数量
　　vm_max_thrrads：设置vm IO同时使用的线程数量

## 基础命令及数据结构

Redis是一个内存中的数据存储系统，可用作数据库、缓存或消息中间件等。  

### 启动Redis

    redis-server --port 6379

配置自动启动脚本、配置文件等：  

    sudo cp utils/redis_init_script /etc/init.d/
    sudo mv /etc/init.d/redis_init_script /etc/init.d/redis_6379
    sudo mkdir /etc/redis
    sudo mkdir -p /var/redis/6379
    sudo cp redis.conf /etc/redis/6379.conf
    sudo vim /etc/redis//6379.conf : daemonize yes；pidfile /var/run/redis_6379.pid；port 6379；dir /var/redis/6379

命令行客户端：  

    redis-cli -h 127.0.0.1 -p 6379  

简单测试Redis是否启动：  

    redis-cli -h 127.0.0.1 -p 6379 PING             #PONG
   
### 基础命令

    SET bar 1
    KEYS *(or other patterns)
    EXISTS bar
    DEL bar
    TYPE bar
    LPUSH foo 1（foo被当作列表）
    GET bar
    INCR bar
    INCRBY num 5
    DECR num
    DECRBY num 2
    INCRBYFLOAT num 1.1
    APPEND bar “hello”
    STRLEN bar
    MSET key1 1 key2 2
    MGET key1 key2
    GETBIT bar 1
    BITCOUNT bar（统计置为1的比特位数）
    BITCOUNT bar 1 2（统计第1个字节和第2个字节中1的比特位数，从0开始计数）
    SETBIT bar 1 1
    BITOP OR res bar num
    BITPOS bar 1（从bar中寻找第一个为1的比特位的位置）
    BITPOS bar 1 4 10（同上寻找，限定查找范围为第4-10个字节）

### 散列类型

一种类似dict的存储结构，不过key只能是字符串。  

    HSET car name BMW（构造散列car，其中name对应的值为BMW)
    HGET car name
    HMSET car name BENZ price 120
    HMGET car name price
    HGETALL car
    HEXISTS car name
    HSETNX car name BMW(当name不存在时，赋值为BMW)
    HINCRBY car price 10
    HDEL car name
    HKEYS car
    HVALS car
    HLEN car

### 列表类型

一种类似于双向链表的存储结构。  

    LPUSH numbers 1 2 3
    RPUSH numbers 0 -1
    LPOP numbers
    RPOP numbers
    LLEN numbers
    LRANGE numbers 0 2(列表切片操作，可以像python那样使用负数下标）
    LREM numbers 2 3(左起移除2个3）/ 0 1(移除所有1) / -1 2(右起移除1个2)
    LINDEX numbers 3
    LSET numbers 3 100
    LTRIM numbers 1 5（保留序号1-5的元素）
    LINSERT numbers BEFORE 1 111（左起寻找1，在1之前插入111）
    LINSERT numbers AFTER 2 222(左起寻找2，在2之后插入222）
    RPOPLPUSH numbers desnums（从numbers右侧pop一个元素插入到desnums左边，像管道一样）

### 集合类型

一种类似于set的存储结构。  

    SADD letter a
    SADD letter a b c
    SMEMBERS letter
    SREM letter c d
    SISMEMBER letter c
    SDIFF setA setB（res = setA - setB)
    SDIFF setA setB setC (res = (setA - setB) - setC)
    SINTER setA setB (交集)
    SINTER setA setB setC
    SUNION setA setB （并集）
    SUNION setA setB setC
    SCARD letter（获取个数）
    SDIFFSTORE setD setA setB（setD = setA - setB)
    SINTERSTORE setE setA setB
    SUNIONSTORE setF setA setB
    SRANDMEMBER setF 2(不重复的取setF中的2个元素出来）
    SRANDMEMBER setF -2（可重复的取setF中的2个元素出来）
    SPOP setF
    SPOP setF 2

### 有序集合

一种类似于优先级队列的存储结构。  

    ZADD scoreboard 89 Tom 67 Peter 100 David
    ZADD testboard 17E+307 a
    ZADD testboard 1.5 b
    ZADD testboard +inf c（可以添加正无穷，同样的-inf表示负无穷）
    ZSCORE scoreboard Peter（获得数值）
    ZRANGE scoreboard 0 2（按照数值从小到大取0-2位）
    ZRANGE scoreboard 1 -1（-1表示最后一位，同负数下标意义相同）
    ZRANGE scoreboard 0 2 WITHSCORES（获得名字的同时返回数值）
    ZREVRANGE scoreboard 0 1（逆序）
    ZRANGEBYSCORE scoreboard 80 100（取分数在80-100之间的元素，从小到大列出）
    ZRANGEBYSCORE scoreboard 80 (100 （表示不包含100）
    ZRANGEBYSCORE scoreboard 60 +inf LIMIT 1 3（60分以上，从小到大排列，取第1-3位（从0开始计数））
    ZREVRANGEBYSCORE scoreboard 100 0 LIMIT 0 3
    ZINCRBY scoreboard 4 Jerry / ZINCRBY scoreboard -4 Jerry
    ZCARD scoreboard(个数)
    ZCOUNT scoreboard 80 100(统计80-100之间的个数）
    ZREM scoreboard Wendy
    ZREMRANGEBYRANK test 0 2(按照排名删除）
    ZREMRANGEBYSCORE test (4 5（按照分数删除）
    ZRANK scoreboard Peter / ZREVRANK scoreboard Peter（获得排名）
    ZINTERSTORE set3 2 set1 set2(set1 和 set2 中元素相交，元素的值相加）
    ZINTERSTORE set4 2 set1 set2 AGGREGATE MIN(set1 和 set2 中元素相交，元素的值取MIN）
    ZINTERSTORE set5 2 set1 set2 AGGREGATE MAX(set1 和 set2 中元素相交，元素的值取MAX）
    ZINTERSTORE set6 2 set1 set2 WEIGHTS 1 0.1(set1 和 set2 中元素相交，元素的值按权重相加）
    ZUNIONSTORE set7 2 set1 set2(set1 和 set2 中元素相并，元素的值相加）


## 事务

Redis通过MULTI…EXEC…来创建执行一个事务。Redis的事务要么不执行，要是开始EXEC执行，则会全部执行，且中间不会插入其他操作，类似原子操作；但是对于执行期错误的事务，没有回滚功能（即，会执行事务中的正确的命令）。

    127.0.0.1:6379> MULTI
    OK
    127.0.0.1:6379> LPUSH numbers 101
    QUEUED
    127.0.0.1:6379> LPUSH numbers 102
    QUEUED
    127.0.0.1:6379> EXEC
    1) (integer) 7
    2) (integer) 8

对于有语法错误的情况，事务不会执行。

    127.0.0.1:6379> MULTI
    OK
    127.0.0.1:6379> LPUSH numbers 1001
    QUEUED
    127.0.0.1:6379> LPUSH numbers
    (error) ERR wrong number of arguments for 'lpush' command
    127.0.0.1:6379> EXEC
    (error) EXECABORT Transaction discarded because of previous errors.

对于执行期错误，事务会执行其中正确的部分，跳过出错的部分。

    127.0.0.1:6379> MULTI
    OK
    127.0.0.1:6379> set numbers 100
    QUEUED
    127.0.0.1:6379> LPUSH numbers 1000
    QUEUED
    127.0.0.1:6379> SET numbers 101
    QUEUED
    127.0.0.1:6379> EXEC
    1) OK
    2) (error) WRONGTYPE Operation against a key holding the wrong kind of value
    3) OK

Redis为事务还提供了一个WATCH命令，它用于监控一个Key，当这个Key在WATCH之后被改动，则后续的事务不会执行。

    127.0.0.1:6379> SET key 1
    OK
    127.0.0.1:6379> WATCH key
    OK
    127.0.0.1:6379> SET key 2
    OK
    127.0.0.1:6379> MULTI
    OK
    127.0.0.1:6379> SET key 3
    QUEUED
    127.0.0.1:6379> EXEC
    (nil)

### 过期时间

Redis经常被用作缓存系统，那么过期时间功能就是必不可少的。  

Redis可以通过EXPIRE/TTL命令设置/查看过期时间。

    127.0.0.1:6379> SET session:29e3d uid1314
    OK
    127.0.0.1:6379> EXPIRE session:29e3d 15
    (integer) 1
    127.0.0.1:6379> TTL session:29e3d
    (integer) 9
    127.0.0.1:6379> TTL session:29e3d
    (integer) 6
    127.0.0.1:6379> TTL session:29e3d
    (integer) -2 # 过期/已被删除的键返回-2
    127.0.0.1:6379> TTL numbers
    (integer) -1 # 没有设置过期时间的键返回-1

可以用PERSIST命令删除过期时间，使Key不会过期。

    127.0.0.1:6379> EXPIRE numbers 150
    (integer) 1
    127.0.0.1:6379> TTL numbers
    (integer) 145
    127.0.0.1:6379> PERSIST numbers
    (integer) 1
    127.0.0.1:6379> TTL numbers
    (integer) -1

重新设置Key也会使得过期时间失效。 

    127.0.0.1:6379> EXPIRE numbers 150
    (integer) 1
    127.0.0.1:6379> TTL numbers
    (integer) 148
    127.0.0.1:6379> SET numbers 101 #重新设置键会令过期时间失效
    OK
    127.0.0.1:6379> TTL numbers
    (integer) -1

但是只对Key的Value进行的操作不会影响Key的过期时间，如INCR LPUSH HSET ZREM等。

    127.0.0.1:6379> EXPIRE numbers 150
    (integer) 1
    127.0.0.1:6379> TTL numbers
    (integer) 149
    127.0.0.1:6379> INCR numbers
    (integer) 102
    127.0.0.1:6379> TTL numbers
    (integer) 121

上面的过期时间命令都是以秒为单位的，Redis也支持使用毫秒为单位。

    127.0.0.1:6379> PEXPIRE numbers 100000 # 毫秒
    (integer) 1
    127.0.0.1:6379> PTTL numbers
    (integer) 94800
    127.0.0.1:6379> PTTL numbers
    (integer) 93904

Redis也支持将一个绝对时间戳作为过期时间。

    127.0.0.1:6379> EXPIREAT numbers 1569145984
    (integer) 1
    127.0.0.1:6379> TTL numbers
    (integer) 99999968
    127.0.0.1:6379> PEXPIREAT numbers 15691459840000
    (integer) 1
    127.0.0.1:6379> PTTL numbers
    (integer) 14222312072159

Note: 键的过期并不会被WATCH命令认为是修改了键。  

将Redis作为缓存系统使用，可以设置配置文件中maxmemory参数，限制Redis的最大可用内存；当超出此限制时，Redis会按照maxmemory-policy参数来删除键值。  

maxmemory-policy参数可以设置为以下之一：  

        volatile-lru
        allkeys-lru
        volatile-random
        allkeys-random
        volatile-ttl
        noeviction

## 排序

可以通过SORT命令对集合、列表、有序集合进行排序。其中，对有序集合进行排序时是以元素本身为准的（忽略分数）。

    127.0.0.1:6379> SADD tag:ruby:posts 2 6 12 26
    (integer) 4
    127.0.0.1:6379> SORT tag:ruby:posts
    1) "2"
    2) "6"
    3) "12"
    4) "26"
    127.0.0.1:6379> LPUSH list 4 5 2 3 8
    (integer) 5
    127.0.0.1:6379> SORT list
    1) "2"
    2) "3"
    3) "4"
    4) "5"
    5) "8"
    127.0.0.1:6379> ZADD zset 50 2 100 3 87 1
    (integer) 3
    127.0.0.1:6379> SORT zset
    1) "1"
    2) "2"
    3) "3"


还可以给SORT添加ALPHA参数实现字典序排序。

    127.0.0.1:6379> LPUSH charlist a b d e c f
    (integer) 6
    127.0.0.1:6379> SORT charlist
    (error) ERR One or more scores can't be converted into double
    127.0.0.1:6379> SORT charlist ALPHA
    1) "a"
    2) "b"
    3) "c"
    4) "d"
    5) "e"
    6) "f"

DESC参数指定按照逆序排序。LIMIT offset count参数用于选取返回结果范围。

    127.0.0.1:6379> SORT tag:ruby:posts DESC
    1) "26"
    2) "12"
    3) "6"
    4) "2"
    127.0.0.1:6379> SORT tag:ruby:posts DESC LIMIT 0 1
    1) "26"
    127.0.0.1:6379> SORT tag:ruby:posts DESC LIMIT 0 2
    1) "26"
    2) "12"

BY参数用于选定排序的基准参考值。

    127.0.0.1:6379> HSET post:2 time 1000
    (integer) 1
    127.0.0.1:6379> HSET post:6 time 900
    (integer) 1
    127.0.0.1:6379> HSET post:12 time 1900
    (integer) 1
    127.0.0.1:6379> HSET post:26 time 100
    (integer) 1
    127.0.0.1:6379> SORT tag:ruby:posts BY post:*->time DESC
    1) "12"
    2) "2"
    3) "6"
    4) "26"

其中，Redis会自动用SORT后的元素值替换BY参数中的*值。  

当BY参数中不包含*值时，排序操作不会进行。 

    127.0.0.1:6379> LPUSH sortbylist 2 1 3
    (integer) 3
    127.0.0.1:6379> SET itemscore:1 50
    OK
    127.0.0.1:6379> SET itemscore:2 100
    OK
    127.0.0.1:6379> SET itemscore:3 -10
    OK
    127.0.0.1:6379> SORT sortbylist BY itemscore:* DESC
    1) "2"
    2) "1"
    3) "3"
    127.0.0.1:6379> SORT sortbylist BY any
    1) "3"
    2) "1"
    3) "2"

SORT语句中可以增加GET参数，用于替换排序返回的结果。  

    127.0.0.1:6379> HSET post:2 title redis
    (integer) 1
    127.0.0.1:6379> HSET post:6 title python
    (integer) 1
    127.0.0.1:6379> HSET post:12 title linux
    (integer) 1
    127.0.0.1:6379> HSET post:26 title libuv
    (integer) 1
    127.0.0.1:6379> SORT tag:ruby:posts BY post:*->time DESC GET post:*->title
    1) "linux"
    2) "redis"
    3) "python"
    4) "libuv"

SORT语句可以有多个GET参数，将一并返回。原始的SORT返回结果可以用GET #。  

    127.0.0.1:6379> SORT tag:ruby:posts BY post:*->time DESC GET post:*->title GET post:*->time GET #
     1) "linux"
     2) "1900"
     3) "12"
     4) "redis"
     5) "1000"
     6) "2"
     7) "python"
     8) "900"
     9) "6"
    10) "libuv"
    11) "100"
    12) "26"

STORE参数可以将排序后的结果保存到一个键中，保存结果为列表类型。

    127.0.0.1:6379> SORT tag:ruby:posts BY post:*->time DESC GET post:*->title GET post:*->time GET # STORE sort.result
    (integer) 12
    127.0.0.1:6379> LRANGE sort.result 0 -1
     1) "linux"
     2) "1900"
     3) "12"
     4) "redis"
     5) "1000"
     6) "2"
     7) "python"
     8) "900"
     9) "6"
    10) "libuv"
    11) "100"
    12) "26"

## 消息通知

Redis中，可以通过LPUSH/RPOP操作实现一个简单的消息队列。生产者不断的LPUSH消息到队列中，而消费者则不断的从队列中RPOP消息。

    127.0.0.1:6379> LPUSH queue 1 2 3
    (integer) 3
    127.0.0.1:6379> RPOP queue 
    1) "queue"
    2) "1"
    127.0.0.1:6379> RPOP queue 
    1) "queue"
    2) "2"
    127.0.0.1:6379> RPOP queue 
    1) "queue"
    2) "3"

Redis还提供了一个BRPOP操作，它有两个参数，一个是键值，一个是超时时间。超时时间填0时，如果队列中是空的，那么BRPOP将一直阻塞知道队列中有值。 

    127.0.0.1:6379> BRPOP queue 0
    # another redis-client begin
    127.0.0.1:6379> LPUSH queue 4
    # another redis-client end
    (integer) 1
    1) "queue"
    2) "4"
    (5.34s)

BRPOP还可以同时接受多个键，任何一个键中有值，那么BRPOP就返回。多个键中均有值，则按照从左到右的优先级返回。

    127.0.0.1:6379> BRPOP queue queue2 0
    # another redis-client begin
    127.0.0.1:6379> LPUSH queue2 5
    # another redis-client end
    (integer) 1
    1) "queue2"
    2) "5"
    (6.01s)

Redis还提供了发布/订阅模式用于进程间消息传递。

    # client A
    127.0.0.1:6379> PUBLISH channel.1 hi
    (integer) 0
    127.0.0.1:6379> SUBSCRIBE channel.1
    Reading messages... (press Ctrl-C to quit)
    1) "subscribe"
    2) "channel.1"
    3) (integer) 1
    # client B
    127.0.0.1:6379> PUBLISH channel.1 hello
    (integer) 1
    # client A
    1) "message"
    2) "channel.1"
    3) "hello"

此外，更复杂一些，可以通过PSUBSCRIBE按照规则订阅，支持通配符匹配。

    # client A
    127.0.0.1:6379> PSUBSCRIBE channel.?*
    Reading messages... (press Ctrl-C to quit)
    1) "psubscribe"
    2) "channel.?*"
    3) (integer) 1
    # client B
    127.0.0.1:6379> PUBLISH channel.10 hello
    (integer) 1
    127.0.0.1:6379> PUBLISH channel.12 hello
    (integer) 1
    # client A
    1) "pmessage"
    2) "channel.?*"
    3) "channel.10"
    4) "hello"
    1) "pmessage"
    2) "channel.?*"
    3) "channel.12"
    4) "hello"

## 节省空间

下面有一些节省存储空间的小建议：  

    精简键名
    内部编码优化（由redis自动选择，可以通过 OBJECT ENCODING car查看）
    当数据量较小时，采用牺牲一定速度的方式来减少内存用量；数据量变大后，则优先保证存取速度；
