# MySQL

Linux->MySQL:
ps -el | grep mysqld
ps -ef | grep mysql
which mysql
mysql -h host -P port -u user -p pwd

## 查看mysql版本：

	mysql> select version();
	mysql> show databases;
	mysql> use xxx;
	mysql> show tables;

## 查看MySQL配置

	SHOW VARIABLES LIKE "secure_file_priv";

## MySQL授权远程用户

	mysql> GRANT ALL PRIVILEGES ON *.* TO 'username'@'%'IDENTIFIED BY 'password' WITH GRANT OPTION; 
	mysql> GRANT ALL PRIVILEGES ON *.* TO 'username'@'ip'IDENTIFIED BY 'password' WITH GRANT OPTION; 

	更新：mysql> FLUSH PRIVILEGES;

	mysql> show grants for username;
	mysql> show grants for username@ip;

	取消授权：REVOKE ALL PRIVILEGES ON *.* FROM 'root'@'123.126.23.70';

	添加用户：create user 'editest'@'%' identified by 'editest123456';
	删除用户：DELETE FROM mysql.user WHERE user='root' AND Host='123.126.23.70';

## 修改账户密码

	mysqladmin -u root -p password 'newpwd'

## MySQL变量

	select (@i:=@i+1) as i,@j,table.*   from table,(select @i:=0,@j:=56) var limit 10;


## MySQL语句小技巧
* 清空表：Truncate Table `abc`;
* 随机数：SELECT FLOOR((RAND() * 999999));
* 字符串拼接：SELECT CONCAT('','');
* 时间戳->date:
	* SELECT UNIX_TIMESTAMP('2015-05-31');
	* SELECT FROM_UNIXTIME(1234567890, '%Y-%m-%d %H:%i:%S');
* 当前时间戳：SELECT UNIX_TIMESTAMP(NOW());
* 联表删除：DELETE FROM A  USING A,B WHERE A.xxx=B.xx;
* 清除缓存：reset query cache;
* HAVING子句：SELECT a,SUM(b) FROM A GROUP BY a HAVING SUM(b)>1;

	%M 月名字(January……December)
	%W 星期名字(Sunday……Saturday)
	%D 有英语前缀的月份的日期(1st, 2nd, 3rd, 等等。）
	%Y 年, 数字, 4 位
	%y 年, 数字, 2 位
	%a 缩写的星期名字(Sun……Sat)
	%d 月份中的天数, 数字(00……31)
	%e 月份中的天数, 数字(0……31)
	%m 月, 数字(01……12)
	%c 月, 数字(1……12)
	%b 缩写的月份名字(Jan……Dec)
	%j 一年中的天数(001……366)
	%H 小时(00……23)
	%k 小时(0……23)
	%h 小时(01……12)
	%I 小时(01……12)
	%l 小时(1……12)
	%i 分钟, 数字(00……59)
	%r 时间,12 小时(hh:mm:ss [AP]M)
	%T 时间,24 小时(hh:mm:ss)
	%S 秒(00……59)
	%s 秒(00……59)
	%p AM或PM
	%w 一个星期中的天数(0=Sunday ……6=Saturday ）
	%U 星期(0……52), 这里星期天是星期的第一天
	%u 星期(0……52), 这里星期一是星期的第一天
	%% 一个文字“%”。

某列不同值的个数：SELECT COUNT(DISTINCT task_name) FROM `talk_task`

SELECT UPPER(str),UCASE(str);//转大写
SELECT LOWER(str),LCASE(str);//转小写


替换字符串：replace (`field_name`,'from_str','to_str') 

select length(str);//字节数
select CHAR_LENGTH(str);//字符数


字符串截取：

* select left('sqlstudy.com', 3);//sql
* select right('sqlstudy.com', 3);//com
* substring(str, pos); substring(str, pos, len)
* SUBSTRING_INDEX(str,delim,count) select substring_index('www.sqlstudy.com.cn', '.', 2); //www.sqlstudy

* SELECT TRIM(' bar '); //默认删除前后空格
* SELECT TRIM(LEADING ',' FROM ',,barxxx');
* SELECT TRIM(BOTH ',' FROM ',,bar,,');
* SELECT TRIM(TRAILING ',' FROM 'bar,,');


* 前补0(LPAD)：select LPAD(uid, 8, 0) from uc_members where uid = '100015';//结果：uid: 00100015
* 后补0(RPAD)：select RPAD(uid, 8, 0),username from uc_members where uid = '100015';

* 查询不连续的数字

	SELECT number FROM (
		SELECT number FROM (SELECT number FROM talk_test) tmp WHERE NOT EXISTS (SELECT 1 FROM talk_test WHERE number=tmp.number-1) OR NOT EXISTS (SELECT 1 FROM talk_test WHERE number=tmp.number+1)
	) t ORDER BY number ASC;

	SELECT a.number as number1,b.number as number2,a.i FROM 

	( SELECT number,(@i:=@i+1) as i FROM ( SELECT number FROM talk_test where `status`=0 ) tmp,(SELECT @i:=0) i WHERE NOT EXISTS (SELECT 1 FROM talk_test WHERE `status`=0 and number=tmp.number-1) ) a

	LEFT JOIN

	( SELECT number,(@j:=@j+1) as j FROM ( SELECT number FROM talk_test where `status`=0 ) tmp1,(SELECT @j:=0) i WHERE NOT EXISTS (SELECT 1 FROM talk_test WHERE `status`=0 and number=tmp1.number+1) ) b ON a.i = b.j;

select
月份,
sum (case when 销售人员='姓名1' then 销售数量*产品单价 else 0 end) as 姓名1销售额,
sum (case when 销售人员='姓名2' then 销售数量*产品单价 else 0 end) as 姓名1销售额,
sum (case when 销售人员='姓名3' then 销售数量*产品单价 else 0 end) as 姓名1销售额
from 表格
group by 月份,销售人员

### 进制转化

* BIN(N）返回二进制值N的一个字符串表示
	* select bin(123);

* OCT(N）返回八进制值N的一个字符串表示
	* select oct(123);

* HEX(N）返回十六进制值N的一个字符串表示
	* select hex(123);
	* select concat('0x', hex(123));

* CONV(N,from_base,to_base) 


Insert into Table2(a, c, d) select a,c,5 from Table1

修改字段非空为空：
ALTER TABLE `m_enterprise` MODIFY epcode varchar(64) NULL;
加一个字段：ALTER TABLE `m_sync` ADD supent_id int(11) NOT NULL DEFAULT 0 after ep_id;

`ep_id` int(11) NOT NULL DEFAULT '0' COMMENT '企业id',
ALTER TABLE `m_terminal_imei` ADD `ep_id` int(11) NOT NULL DEFAULT 0 COMMENT '企业id' after `eid`;

查看列：desc 表名;
修改表名：alter table t_book rename to bbb;
添加列：alter table 表名 add column 列名 varchar(30);
删除列：alter table 表名 drop column 列名;
修改列名： alter table 表名 change 列名 新列名 int;
修改列属性：alter table 表名 modify name varchar(22);



设置自增起始值：
ALTER TABLE `mygame_spend_log` AUTO_INCREMENT = 1;
创建索引：
唯一键索引=》CREATE UNIQUE INDEX uid ON mygame_member_extend_info(uid);
CREATE INDEX `NAME` ON `TABLE` (`COLUMN1`, `COLUMN2`)
* select自增

	select (@i:=@i+1) as i FROM table,(select @i:=0) as a

* 查询一张表不在另一表的数据

	select a.* from mygame_member a where not exists (select 1 from mygame_member_extend_info b where b.uid = a.uid)

* 将表中数据重新排序更换ID

	DROP TEMPORARY TABLE tmp;
	CREATE TEMPORARY TABLE tmp SELECT * FROM `gong_city` ORDER BY province_id asc;
	DELETE FROM `gong_city`;
	ALTER TABLE `gong_city` AUTO_INCREMENT = 1;
	INSERT INTO `gong_city`(city_name,province_id) SELECT city_name,province_id FROM tmp;


* 查看数据表中字符集设置

	SHOW CREATE TABLE tablename\G
	SELECT COLLATION_NAME FROM `COLUMNS` where TABLE_NAME = 'xxx';
	
* 修改 MYSQL 表的字符集

	ALTER TABLE tbl_name CONVERT TO CHARACTER SET charset_name;

show processlist;
show full processlist;

外部IP进mysql
grant all privileges  ON *.* TO dwjs@'58.241.113.75' IDENTIFIED BY 'shdw.com';

mysqldump -h[hosname] -u[user_name] -p[password] --default-character-set=[char_set_name] [db_name] > [save_path]
         例:然后输入:mysqldump -h119.12.12.11 -umysql-pmysql123--default-character-set=utf8 aspchina --skip-lock-tables> d:\aspchina_net.sql

 也可以：mysqldump -h119.12.12.11 -u mysql > d:\aspchina_net.sql


mysqldump -hlocalhost -u mysql pbx_00010078.e_acc_callcenter_statics > a_111.sql


1.以html格式输出结果
使用mysql客户端的参数–html或者-T，则所有SQL的查询结果会自动生成为html的table代码
$ mysql -u root --html
Welcome to the MySQL monitor. Commands end with ; or \g.
Your MySQL connection id is 3286
Server version: 5.1.24-rc-log MySQL Community Server (GPL)
Type 'help;' or '\h' for help. Type '\c' to clear the buffer.
mysql> select * from test.test;
<TABLE BORDER=1><TR><TH>i</TH></TR><TR><TD>1</TD></TR><TR><TD>2</TD></TR></TABLE>
2 rows in set (0.00 sec)
2.以xml格式输出结果
跟上面差不多，使用–xml或者-X选项，可以将结果输出为xml格式
$ mysql -u root --xml
Welcome to the MySQL monitor. Commands end with ; or \g.
Your MySQL connection id is 3287
Server version: 5.1.24-rc-log MySQL Community Server (GPL)
Type 'help;' or '\h' for help. Type '\c' to clear the buffer.
mysql> select * from test.test;
<?xml version="1.0"?>
<resultset statement="select * from test.test;"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<row>
<field name="i">1</field>
</row>
<row>
<field name="i">2</field>
</row>
</resultset>
2 rows in set (0.00 sec)
3.修改命令提示符
使用mysql的–prompt=选项，或者进入mysql命令行环境后使用prompt命令，都可以修改提示符
mysql> prompt \u@\d>
PROMPT set to '\u@\d>'
root@(none)>use mysql
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A
Database changed
root@mysql>
其中\u表示当前连接的用户，\d表示当前连接的数据库，其他更多的可选项可以参考man mysql
4.使用\G按行垂直显示结果
如果一行很长，需要这行显示的话，看起结果来就非常的难受。在SQL语句或者命令后使用\G而不是分号结尾，可以将每一行的值垂直输出。这个可能也是大家对于MySQL最熟悉的区别于其他数据库工具的一个特性了。
mysql> select * from db_archivelog\G
*************************** 1. row ***************************
id: 1
check_day: 2008-06-26
db_name: TBDB1
arc_size: 137
arc_num: 166
per_second: 1.6
avg_time: 8.7

5.使用pager设置显示方式
如果select出来的结果集超过几个屏幕，那么前面的结果一晃而过无法看到。使用pager可以设置调用os的more或者less等显示查询结果，和在os中使用more或者less查看大文件的效果一样。
使用more
mysql> pager more
PAGER set to 'more'
mysql> \P more
PAGER set to 'more'
使用less
mysql> pager less
PAGER set to 'less'
mysql> \P less
PAGER set to 'less'
还原成stdout
mysql> nopager
PAGER set to stdout
6.使用tee保存运行结果到文件
这个类似于sqlplus的spool功能，可以将命令行中的结果保存到外部文件中。如果指定已经存在的文件，则结果会附加到文件中。
mysql> tee output.txt
Logging to file 'output.txt'
或者
mysql> \T output.txt
Logging to file 'output.txt'
mysql> notee
Outfile disabled.
或者
mysql> \t
Outfile disabled.
7.执行OS命令
mysql> system uname
Linux
mysql> \! uname
Linux
8.执行SQL文件
mysql> source test.sql
+----------------+
| current_date() |
+----------------+
| 2008-06-28 |
+----------------+
1 row in set (0.00 sec)
或者
mysql> \. test.sql
+----------------+
| current_date() |
+----------------+
| 2008-06-28 |
+----------------+
1 row in set (0.00 sec)
其他还有一些功能，可以通过help或者?获得MySQL命令行支持的一些命令。


## 存储过程

大批量插入数据：

	set sql_mode='';
	delimiter //
	CREATE PROCEDURE aaaa()  
		begin  
			declare v int default 0;  
			while v < 8000000  
			do  
				insert into part_tab  values (v,'testing partitions',adddate('1995-01-01',(rand(v)*36520) mod 3652));  
				set v = v + 1;
			end while;  
		end  
		//  
	delimiter ;
	call aaaa();





