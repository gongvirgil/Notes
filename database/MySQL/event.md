# 事件

mysql5.1版本开始引进event概念。event既“时间触发器”，与triggers的事件触发不同，event类似与linux crontab计划任务，用于时间触发。通过单独或调用存储过程使用，在某一特定的时间点，触发相关的SQL语句或存储过程。


* 查看是否开启：show variables like 'event_scheduler';
* 设置是否开启：
    * set global event_scheduler = on;
    * set global event_scheduler = off;
    * 每次重启电脑。或重启mysql服务后，会发现，事件自动关闭（`event_scheduler=OFF`）。如需一直保持开启，则修改`my.ini`配置文件的[mysqld]部分，加上event_scheduler=ON 即可。

* 创建：CREATE DEFINER=`root`@`localhost` EVENT [IF NOT EXISTS] `{event_name}` ON SCHEDULE schedule [ON COMPLETION [NOT] PRESERVE] [ENABLE | DISABLE] [COMMENT 'comment'] DO sql_statement
    * `DEFINER`：创建者
    * `ON COMPLETION [NOT] PRESERVE`：表示当事件不会再发生的情况下，删除事件（注意特定时间执行的事件，如果设置了该参数，执行完毕后，事件将被删除，不想删除的话可以设置成ON COMPLETION PRESERVE）
    * `ENABLE`：表示系统将执行这个事件
* 修改：ALTER EVENT `{event_name}` ON SCHEDULE schedule [ON COMPLETION [NOT] PRESERVE] [ENABLE | DISABLE] [COMMENT 'comment'] DO sql_statement
* 查询
    * select * from mysql.event;
    * show events;
    * show full events;
    * select * from information_schema.events;
    * show create event `{event_name}`;
* 删除：DROP EVENT [IF EXISTS] `{event_name}`;

## 间隔触发
---

```
DROP EVENT IF EXISTS `event_minute`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` EVENT `event_minute` ON SCHEDULE EVERY 1 MINUTE STARTS '2016-01-17 14:49:43' ON COMPLETION NOT PRESERVE ENABLE DO

BEGIN
    INSERT INTO USER(name, address,addtime) VALUES('test1','test1',now());
    INSERT INTO USER(name, address,addtime) VALUES('test2','test2',now());
END //
DELIMITER ;
```

## 特定事件触发
---

```
DROP EVENT IF EXISTS `event_at`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` EVENT `event_at` ON SCHEDULE AT '2016-01-17 15:30:00' ON COMPLETION NOT PRESERVE ENABLE DO

BEGIN
    INSERT INTO USER(name, address,addtime) VALUES('AT','AT',now());
END //
DELIMITER ;
```