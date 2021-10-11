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

## 字符集

* 查看字符集配置：show variables like 'character_set_%';
* 修改字符集配置：set character_set_server=utf8;

## 字段数据类型

> 数值

| 类型  | 大小 | 范围（有符号） | 范围（无符号） | 用途 |
|---|---|---|---|---|
| TINYINT	  | 1 byte	| (-128，127)	                  | (0，255)	        | 小整数值 |
| SMALLINT	  | 2 bytes	| (-32 768，32 767)	              | (0，65 535)	        | 大整数值 |
| MEDIUMINT	  | 3 bytes	| (-8 388 608，8 388 607)	      | (0，16 777 215)	    | 大整数值 |
| INT INTEGER | 4 bytes	| (-2 147 483 648，2 147 483 647) | (0，4 294 967 295)  | 大整数值 |
| BIGINT	  | 8 bytes	| (-9,223,372,036,854,775,808，9 223 372 036 854 775 807)	| (0，18 446 744 073 709 551 615)	| 极大整数值 |
| FLOAT	      | 4 bytes	| (-3.402 823 466 E+38，-1.175 494 351 E-38)，0，(1.175 494 351 E-38，3.402 823 466 351 E+38) |	0，(1.175 494 351 E-38，3.402 823 466 E+38)	| 单精度浮点数值 |
| DOUBLE	  | 8 bytes	| (-1.797 693 134 862 315 7 E+308，-2.225 073 858 507 201 4 E-308)，0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308) | 0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308) | 双精度浮点数值 |
| DECIMAL	  | 对DECIMAL(M,D) ，如果M>D，为M+2否则为D+2 | 依赖于M和D的值 | 依赖于M和D的值 | 小数值 |

> 日期和时间

| 类型		 | 大小( bytes)	| 范围 | 格式 | 用途 |
|---|---|---|---|---|
| DATE		| 3	| 1000-01-01/9999-12-31					  | YYYY-MM-DD	        | 日期值                |
| TIME		| 3	| '-838:59:59'/'838:59:59'				  | HH:MM:SS	        | 时间值或持续时间		  |
| YEAR		| 1	| 1901/2155								  | YYYY	            | 年份值				|
| DATETIME	| 8	| 1000-01-01 00:00:00/9999-12-31 23:59:59 | YYYY-MM-DD HH:MM:SS	| 混合日期和时间值		  |
| TIMESTAMP	| 4	| 1970-01-01 00:00:00/2038 				  | YYYYMMDD HHMMSS	    | 混合日期和时间值，时间戳 |

`TIMESTAMP`的结束时间是第 2147483647 秒，北京时间 2038-1-19 11:14:07，格林尼治时间 2038年1月19日 凌晨 03:14:07

> 字符串

| 类型 | 大小 | 用途 |
|---|---|---|
| CHAR	     | 0-255 bytes	         | 定长字符串
| VARCHAR	 | 0-65535 bytes	     | 变长字符串
| TINYBLOB	 | 0-255 bytes	         | 不超过 255 个字符的二进制字符串
| TINYTEXT	 | 0-255 bytes	         | 短文本字符串
| BLOB	     | 0-65535 bytes	     | 二进制形式的长文本数据
| TEXT	     | 0-65535 bytes	     | 长文本数据
| MEDIUMBLOB | 0-16777215 bytes	 	 | 二进制形式的中等长度文本数据
| MEDIUMTEXT | 0-16777215 bytes	 	 | 中等长度文本数据
| LONGBLOB	 | 0-4294967295 bytes    | 二进制形式的极大文本数据
| LONGTEXT	 | 0-4294967295 bytes    | 极大文本数据



注意：char(n) 和 varchar(n) 中括号中 n 代表字符的个数，并不代表字节个数，比如 CHAR(30) 就可以存储 30 个字符。

CHAR 和 VARCHAR 类型类似，但它们保存和检索的方式不同。它们的最大长度和是否尾部空格被保留等方面也不同。在存储或检索过程中不进行大小写转换。

BINARY 和 VARBINARY 类似于 CHAR 和 VARCHAR，不同的是它们包含二进制字符串而不要非二进制字符串。也就是说，它们包含字节字符串而不是字符字符串。这说明它们没有字符集，并且排序和比较基于列值字节的数值值。

BLOB 是一个二进制大对象，可以容纳可变数量的数据。有 4 种 BLOB 类型：TINYBLOB、BLOB、MEDIUMBLOB 和 LONGBLOB。它们区别在于可容纳存储范围不同。

有 4 种 TEXT 类型：TINYTEXT、TEXT、MEDIUMTEXT 和 LONGTEXT。对应的这 4 种 BLOB 类型，可存储的最大长度不同，可根据实际情况选择。

## 键&索引

> 主键

> 外键

> 索引

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



