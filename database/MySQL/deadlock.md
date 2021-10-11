# 死锁

## 定位

* 数据库版本查询方法：select version(); 
* 引擎查询方法：show create table fund_transfer_stream; 
* 建表语句中会显示存储引擎信息，形如：ENGINE=InnoDB。
* 事务隔离级别查询方法：select @@tx_isolation; 
* 事务隔离级别设置方法(只对当前 Session 生效)：set session transaction isolation level read committed;

PS：注意，如果数据库是分库的，以上几条 SQL 语句需要在单库上执行，不要在逻辑库执行。

* 当数据库发生死锁时，可以通过以下命令获取死锁日志：show engine innodb status 