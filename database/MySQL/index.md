## 存储引擎

* MyISAM
* InnoDB
* Berkeley DB
MySQL5.5以后默认使用InnoDB存储引擎

## 索引

## 事务

MySQL的事务支持不是绑定在MySQL服务器本身，而是与存储引擎相关，MyISAM不支持事务，用于只读程序提高性能，InnoDB支持ACID事务、行级锁、并发，Berkeley DB支持事务。

* `begin;` ：事务开始
* `commit;` ：成功则提交，事务结束
* `rollback;` ：失败则回滚，事务结束

## 存储过程




## 锁

数据库使用锁是为了支持更好的并发，提供数据的完整性和一致性。

InnoDB是一个支持行锁的存储引擎，锁的类型有：共享锁（S）、排他锁（X）、意向共享（IS）、意向排他（IX）。

为了提供更好的并发，InnoDB提供了非锁定读：不需要等待访问行上的锁释放，读取行的一个快照。该方法是通过InnoDB的MVCC特性来实现的。

MySQL/InnoDB有3种行锁的算法：
   
* `记录锁(Record Lock)`：锁定单条记录
* `间隙锁(Gap Lock)`：锁定一个范围的记录、但不包括记录本身
* `(Next-Key Lock)`：锁定一个范围的记录、并且包含记录本身（InnoDB默认加锁方式）


Note: 在聚集索引中，如果主键有唯一性约束，Next-Key Lock 会自动降级为Record Lock。

## 隔离级别(Isolation Level)

MySQL/InnoDB有4种隔离级别：

* `Read Uncommited` : 。
* `Read Committed (RC)` : 快照读忽略。针对当前读，RC隔离级别保证对读取到的记录加锁 (记录锁)，存在幻读现象。
* `Repeatable Read (RR)` : 快照读忽略。针对当前读，RR隔离级别保证对读取到的记录加锁 (记录锁)，同时保证对读取的范围加锁，新的满足查询条件的记录不能够插入 (间隙锁)，不存在幻读现象。
* `Serializable` : 从MVCC并发控制退化为基于锁的并发控制。不区别快照读与当前读，所有的读操作均为当前读，读加读锁 (S锁)，写加写锁 (X锁)。Serializable隔离级别下，读写冲突，因此并发度急剧下降，在MySQL/InnoDB下不建议使用。

## 基础操作

* 创建库

	CREATE DATABASE IF NOT EXISTS `dbname` DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

* 创建表

	CREATE TABLE `mydoc_test` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

* 删减表

	DROP TABLE IF EXISTS `abc`;//删除表
	TRUNCATE TABLE `abc`;//清空表

* 插入数据
	
	INSERT INTO `mydoc_test`(id) VALUES(1);
	INSERT INTO `mydoc_test` VALUES(2);

* 修改数据

* 删除数据

* 添加索引

	ALTER TABLE `tablename` ADD INDEX `indexname`(`indexcolumn1`,`indexcolumn2`);

* 删除索引

　　DROP INDEX `indexname` ON `talbename`;
　　ALTER TABLE `tablename` DROP INDEX `indexname`;

　　ALTER TABLE tablename DROP PRIMARY KEY

* 创建存储过程

	CREATE DEFINER=`root`@`localhost` PROCEDURE `procedurename`()
	BEGIN
	END

* 调用存储过程

	CALL `dbname`.`procedurename`();

* 查看存储过程

	SHOW CREATE PROCEDURE `dbname`.`procedurename`;

* 删除存储过程



## 大数据

## 优化



