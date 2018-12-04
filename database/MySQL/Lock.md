# 锁

innodb_trx         ## 当前运行的所有事务
innodb_locks       ## 当前出现的锁
innodb_lock_waits  ## 锁等待的对应关系

## 当前运行的所有事务-information_schema.INNODB_TRX


| Field                      | Comment |
|----------------------------|---------|
| trx_id                     |   事务ID      |
| trx_state                  |   事务状态      |
| trx_started                |   事务开始时间      |
| trx_requested_lock_id      |   `innodb_locks.lock_id`      |
| trx_wait_started           |   事务开始等待的时间      |
| trx_weight                 |         |
| trx_mysql_thread_id        |   事务线程ID      |
| trx_query                  |   具体SQL语句     |
| trx_operation_state        |   事务当前操作状态     |
| trx_tables_in_use          |   事务中有多少个表被使用      |
| trx_tables_locked          |   事务拥有多少个锁      |
| trx_lock_structs           |         |
| trx_lock_memory_bytes      |   事务锁住的内存大小（B）      |
| trx_rows_locked            |   事务锁住的行数      |
| trx_rows_modified          |   事务更改的行数      |
| trx_concurrency_tickets    |   事务并发票数      |
| trx_isolation_level        |   事务隔离级别      |
| trx_unique_checks          |   是否唯一性检查      |
| trx_foreign_key_checks     |   是否外键检查      |
| trx_last_foreign_key_error |   最后的外键错误      |
| trx_adaptive_hash_latched  |         |
| trx_adaptive_hash_timeout  |         |


## 当前出现的锁-information_schema.INNODB_LOCKS


| Field       | Comment |
|-------------|---------|
| lock_id     | 锁ID			|
| lock_trx_id | 拥有锁的事务ID	|
| lock_mode   | 锁模式	|
| lock_type   | 锁类型	|
| lock_table  | 被锁的表	|
| lock_index  | 被锁的索引	|
| lock_space  | 被锁的表空间号	|
| lock_page   | 被锁的页号	|
| lock_rec    | 被锁的记录号	|
| lock_data   | 被锁的数据	|

## 锁等待的对应关系-information_schema.INNODB_LOCK_WAITS


| Field             | Comment |
|-------------------|---------|
| requesting_trx_id | 请求锁的事务ID	|
| requested_lock_id | 请求锁的锁ID	|
| blocking_trx_id   | 当前拥有锁的事务ID	|
| blocking_lock_id  | 当前拥有锁的锁ID	|