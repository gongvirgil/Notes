# MySQL

## 基础操作
---

* 创建库
	* CREATE DATABASE IF NOT EXISTS `dbname` DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

* 创建表
```
	CREATE TABLE `tablename` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT '';
```
* 清空表
	* TRUNCATE TABLE `tablename`;
* 删除表
	* DROP TABLE IF EXISTS `tablename`;

* 插入数据
	* INSERT INTO `tablename`(id) VALUES(1);
	* INSERT INTO `tablename` VALUES(2);
	* INSERT INTO `tablename2`(`columnname`) SELECT `columnname` FROM `tablename1`
	* INSERT INTO TABLE (a,b) VALUES (1,0),(2,0) ON DUPLICATE KEY UPDATE b=VALUES(b);
* 修改数据
	* UPDATE `tablename` SET `columnname1`=2 WHERE `columnname2`=1;
* 删除数据
	* DELETE FROM `tablename` WHERE `columnname`=1;
* 添加字段
	* ALTER TABLE `tablename` ADD `columnname` int(11) NOT NULL DEFAULT 0 COMMENT '' AFTER `columnname1`;
* 修改字段
	* 修改字段名称: ALTER TABLE `tablename` CHANGE `columnname1` `columnname2` CHAR(32) NOT NULL DEFAULT '';
	* 修改字段属性: ALTER TABLE `tablename` MODIFY `columnname` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '';//修改时需带完整性约束条件
	* 修改字段自增长属性: ALTER TABLE `tablename` MODIFY `columnname` int(11) NOT NULL AUTO_INCREMENT;
* 删除字段
	* ALTER TABLE `tablename` DROP COLUMN `columnname`;   
* 修改自增长的值
	* ALTER TABLE `tablename` AUTO_INCREMENT=1;

## 存储引擎
---

* MyISAM
* InnoDB
* Berkeley DB
MySQL5.5以后默认使用InnoDB存储引擎

* 查询引擎
	* SHOW ENGINES;
* 修改存储引擎
	* ALTER TABLE `tablename` ENGINE=MyISAM;
	* ALTER TABLE `tablename` ENGINE=InnoDB;

## 键&索引
---

* [索引](./database/MySQL/Indexes.md)
* 添加索引
	* ALTER TABLE `tablename` ADD INDEX `indexname`(`indexcolumn1`,`indexcolumn2`);
	* ALTER TABLE `tablename` ADD KEY `indexname`(`indexcolumn1`,`indexcolumn2`);
	* ALTER TABLE `tablename` ADD UNIQUE KEY `indexname`(`indexcolumn1`,`indexcolumn2`);
	* ALTER TABLE `tablename` ADD PRIMARY KEY `indexname`(`indexcolumn1`,`indexcolumn2`);
* 删除索引
	* DROP INDEX `indexname` ON `talbename`;
	* ALTER TABLE `tablename` DROP INDEX `indexname`;
	* ALTER TABLE `tablename` DROP KEY `indexname`;
	* 删除主键: ALTER TABLE `tablename` DROP PRIMARY KEY;//先删除自增长属性: ALTER TABLE `tablename` MODIFY `id` INT UNSIGNED;

## 事务
---

* [事务](./database/MySQL/transaction.md)

MySQL的事务支持不是绑定在MySQL服务器本身，而是与存储引擎相关，MyISAM不支持事务，用于只读程序提高性能，InnoDB支持ACID事务、行级锁、并发，Berkeley DB支持事务。

* `begin;` ：事务开始
* `commit;` ：成功则提交，事务结束
* `rollback;` ：失败则回滚，事务结束

## 分区
---

* [分区](./database/MySQL/partition.md)

Note: 默认分区限制分区字段必须是主键（`PRIMARY KEY`)的一部分。

* 创建分区表
	* RANGE: CREATE TABLE `tablename` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY )  PARTITION BY RANGE (id);
	* LIST:  CREATE TABLE `tablename` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY )  PARTITION BY LIST (id);
	* HASH:  CREATE TABLE `tablename` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY )  PARTITION BY HASH (id);
	* KEY:   CREATE TABLE `tablename` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY )  PARTITION BY KEY (id);
	* 子分区:CREATE TABLE `tablename` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY )  PARTITION BY RANGE (id) SUBPARTITION BY HASH (id % 4)
* 已有表加分区
	* ALTER TABLE `tablename` PARTITION BY RANGE (id);
* 删除分区
	* ALERT TABLE `tablename` DROP PARTITION p0;
* 重建分区
	* RANGE: ALTER TABLE `tablename` REORGANIZE PARTITION p0,p1 INTO (PARTITION p0 VALUES LESS THAN (6000000));
	* LIST:  ALTER TABLE `tablename` REORGANIZE PARTITION p0,p1 INTO (PARTITION p0 VALUES IN(0,1,4,5,8,9,12,13));
	* HASH/KEY:  ALTER TABLE `tablename` REORGANIZE PARTITION COALESCE PARTITION 2; (只能减少不能增加。想要增加可以用 `ADD PARTITION` 方法。)
* 新增分区
	* RANGE: ALTER TABLE `tablename` ADD PARTITION (PARTITION p2 VALUES IN (16,17,18,19));
	* HASH/KEY:  ALTER TABLE `tablename` ADD PARTITION PARTITIONS 2;

## 自定义函数
---

* 定义函数
```
DELIMITER //
CREATE FUNCTION `functionname`()
RETURNS VARCHAR(255)
BEGIN
END //
```
* 调用函数
	* `functionname`();
* 查看函数
	* SELECT `name` FROM mysql.proc WHERE `db`='dbname' AND `type`='FUNCTION';
	* SHOW FUCNTION STATUS LIKE '`functionname`';
	* SHOW CREATE FUNCTION `functionname`;
* 删除函数
	* DROP FUNCTION IF EXISTS `functionname`;

```
DROP FUNCTION if EXISTS test;
delimiter //
CREATE FUNCTION test()
RETURNS VARCHAR(255)
BEGIN
RETURN "This is a test function.";
END //  
delimiter ;

test();
```

## 存储过程
---

* 创建存储过程
```
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedurename`()
BEGIN
END //
DELIMITER ;
```
* 调用存储过程
	* CALL `dbname`.`procedurename`();
* 查看存储过程
	* SELECT `name` FROM mysql.proc WHERE `db`='dbname' AND `type`='PROCEDURE';
	* SHOW PROCEDURE STATUS;
	* SHOW CREATE PROCEDURE `dbname`.`procedurename`;
* 删除存储过程
	* DROP PROCEDURE IF EXISTS `procedurename`;

```
DROP PROCEDURE if EXISTS test;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE test()
BEGIN
END //  
DELIMITER ;

CALL test();
```

## 游标

---

* 定义游标
	* DECLARE `cursorname` CURSOR FOR select `column1`,`column2` from `table`;
* 打开游标
	* OPEN `cursorname`;
* 获取游标
	* FETCH `cursorname` INTO a,b;
* 关闭游标
	* CLOSE `cursorname`;

``` 
DROP PROCEDURE if EXISTS test;
DELIMITER //
CREATE PROCEDURE `test` ()
BEGIN
-- 定义接收游标数据的变量 
  DECLARE a int; 
  DECLARE b varchar(32);
  -- 定义遍历数据结束标志
  DECLARE done INT DEFAULT FALSE;
  -- 定义游标[游标和游标中使用的变量，必须在定义变量后]
  DECLARE `cursorname` CURSOR FOR SELECT `column1`,`column2` FROM `tablename`;
  -- 将结束标志绑定到游标
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
  -- 打开游标
  OPEN `cursorname`;
  
  -- 开始循环
  read_loop: LOOP
    -- 提取游标里的数据，这里只有一个，多个的话也一样；
    FETCH cur INTO a,b;
    -- 声明结束的时候
    IF done THEN
      LEAVE read_loop;
    END IF;
    -- 这里做你想做的循环的事件
    INSERT INTO `tablename`(`column1`,`column2`) VALUES (a,b);
  END LOOP;
  -- 关闭游标
  CLOSE `cursorname`;
END //
DELIMITER ;
```

## 预处理
---

* 定义:
	* PREPARE `statement_name` FROM `sql`;
* 执行:
	* EXECUTE `statement_name` [USING variable [,variable...]];
* 删除:
	DEALLOCATE PREPARE `statement_name`;

```
PREPARE test FROM "INSERT INTO examlple VALUES(?,?)";
SET @a='1'; 
SET @b='2'; 
EXECUTE test USING @a,@b; 
SET @c='3';
EXECUTE test USING @a,@c; 
DEALLOCATE PREPARE test; 
```

## 锁
---

数据库使用锁是为了支持更好的并发，提供数据的完整性和一致性。

InnoDB是一个支持行锁的存储引擎，锁的类型有：共享锁（S）、排他锁（X）、意向共享（IS）、意向排他（IX）。

为了提供更好的并发，InnoDB提供了非锁定读：不需要等待访问行上的锁释放，读取行的一个快照。该方法是通过InnoDB的MVCC特性来实现的。

MySQL/InnoDB有3种行锁的算法：
   
* `记录锁(Record Lock)`：锁定单条记录
* `间隙锁(Gap Lock)`：锁定一个范围的记录、但不包括记录本身
* `(Next-Key Lock)`：锁定一个范围的记录、并且包含记录本身（InnoDB默认加锁方式）


Note: 在聚集索引中，如果主键有唯一性约束，Next-Key Lock 会自动降级为Record Lock。

## 隔离级别(Isolation Level)
---

MySQL/InnoDB有4种隔离级别：

* `Read Uncommited` : 。
* `Read Committed (RC)` : 快照读忽略。针对当前读，RC隔离级别保证对读取到的记录加锁 (记录锁)，存在幻读现象。
* `Repeatable Read (RR)` : 快照读忽略。针对当前读，RR隔离级别保证对读取到的记录加锁 (记录锁)，同时保证对读取的范围加锁，新的满足查询条件的记录不能够插入 (间隙锁)，不存在幻读现象。
* `Serializable` : 从MVCC并发控制退化为基于锁的并发控制。不区别快照读与当前读，所有的读操作均为当前读，读加读锁 (S锁)，写加写锁 (X锁)。Serializable隔离级别下，读写冲突，因此并发度急剧下降，在MySQL/InnoDB下不建议使用。

## 大数据
---

## 测试
---

mysqlslap

## 优化
---



