# 事务

* MySQL的事务支持不是绑定在MySQL服务器本身，而是与存储引擎相关，MyISAM不支持事务，用于只读程序提高性能，InnoDB支持ACID事务、行级锁、并发，Berkeley DB支持事务。
* 事务 ACID Atomicity（原子性）、Consistency（稳定性）、Isolation（隔离性）、Durability（可靠性）
	* `原子性`：一组事务，要么成功；要么撤回。
	* `稳定性`：有非法数据（外键约束之类），事务撤回。
	* `隔离性`：事务独立运行。
		* 一个事务处理后的结果，影响了其他事务，那么其他事务会撤回。
		* 事务的100%隔离，需要牺牲速度。
	* `可靠性`：软、硬件崩溃后，InnoDB数据表驱动会利用日志文件重构修改。
		* 可靠性和高速度不可兼得， innodb_flush_log_at_trx_commit选项 决定什么时候吧事务保存到日志里。

开启事务
START TRANSACTION 或 BEGIN

提交事务（关闭事务）
COMMIT

放弃事务（关闭事务）
ROLLBACK

折返点
SAVEPOINT adqoo_1
ROLLBACK TO SAVEPOINT adqoo_1
发生在折返点 adqoo_1 之前的事务被提交，之后的被忽略

事务的终止

设置“自动提交”模式
SET AUTOCOMMIT = 0
每条SQL都是同一个事务的不同命令，之间由 COMMIT 或 ROLLBACK隔开
掉线后，没有 COMMIT 的事务都被放弃

事务锁定模式

系统默认： 不需要等待某事务结束，可直接查询到结果，但不能再进行修改、删除。
缺点：查询到的结果，可能是已经过期的。
优点：不需要等待某事务结束，可直接查询到结果。

需要用以下模式来设定锁定模式

1、SELECT …… LOCK IN SHARE MODE（共享锁）
查询到的数据，就是数据库在这一时刻的数据（其他已commit事务的结果，已经反应到这里了）
SELECT 必须等待，某个事务结束后才能执行

2、SELECT …… FOR UPDATE（排它锁）
例如 SELECT * FROM tablename WHERE id<200
那么id<200的数据，被查询到的数据，都将不能再进行修改、删除、SELECT …… LOCK IN SHARE MODE操作
一直到此事务结束

共享锁 和 排它锁 的区别：在于是否阻断其他客户发出的 SELECT …… LOCK IN SHARE MODE命令

3、INSERT / UPDATE / DELETE
所有关联数据都会被锁定，加上排它锁

4、防插入锁
例如 SELECT * FROM tablename WHERE id>200
那么id>200的记录无法被插入

5、死锁
自动识别死锁
先进来的进程被执行，后来的进程收到出错消息，并按ROLLBACK方式回滚
innodb_lock_wait_timeout = n 来设置最长等待时间，默认是50秒

事务隔离模式

SET [SESSION|GLOBAL] TRANSACTION ISOLATION LEVEL
READ UNCOMMITTED | READ COMMITTED | REPEATABLE READ | SERIALIZABLE
1、不带SESSION、GLOBAL的SET命令
只对下一个事务有效
2、SET SESSION
为当前会话设置隔离模式
3、SET GLOBAL
为以后新建的所有MYSQL连接设置隔离模式（当前连接不包括在内）

隔离模式

   READ UNCOMMITTED
不隔离SELECT
其他事务未完成的修改（未COMMIT），其结果也考虑在内

   READ COMMITTED
把其他事务的 COMMIT 修改考虑在内
同一个事务中，同一 SELECT 可能返回不同结果

   REPEATABLE READ（默认）
不把其他事务的修改考虑在内，无论其他事务是否用COMMIT命令提交过
同一个事务中，同一 SELECT 返回同一结果（前提是本事务，不修改）

   SERIALIZABLE
和REPEATABLE READ类似，给所有的SELECT都加上了 共享锁

出错处理
根据出错信息，执行相应的处理


mysql事物处理实例

MYSQL的事务处理主要有两种方法
1.用begin,rollback,commit来实现
    begin开始一个事务
    rollback事务回滚
    commit 事务确认
2.直接用set来改变mysql的自动提交模式
    mysql默认是自动提交的，也就是你提交一个query，就直接执行！可以通过
    set autocommit = 0 禁止自动提交
    set autocommit = 1 开启自动提交
    来实现事务的处理。
但要注意当用set autocommit = 0 的时候，你以后所有的sql都将作为事务处理，直到你用commit确认或 rollback结束，注意当你结束这个事务的同时也开启了新的事务！按第一种方法只将当前的做为一个事务!
MYSQL只有 INNODB和BDB类型的数据表才支持事务处理，其他的类型是不支持的!