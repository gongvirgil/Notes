# MySQL

Linux->MySQL:
ps -el | grep mysqld
ps -ef | grep mysql
which mysql
mysql -uroot -p

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

	删除添加的用户  
	DELETE FROM mysql.user WHERE user='root' AND Host='123.126.23.70';

## 修改账户密码

	mysqladmin -u root -p password 'newpwd'

## MySQL变量

	select (@i:=@i+1) as i,@j,table.*   from table,(select @i:=0,@j:=56) var limit 10;


## MySQL语句小技巧
清空表：Truncate Table `abc`;
随机数
SELECT FLOOR((RAND() * 999999));
字符串拼接
SELECT CONCAT('','');
时间戳->date:
SELECT UNIX_TIMESTAMP('2015-05-31');
SELECT FROM_UNIXTIME(1234567890, '%Y-%m-%d %H:%i:%S');
SELECT	DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%S');
联表删除：DELETE FROM A  USING A,B WHERE A.xxx=B.xx;
清除缓存：reset query cache;
HAVING子句：SELECT a,SUM(b) FROM A GROUP BY a HAVING SUM(b)>1;

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





