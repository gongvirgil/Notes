# 主从MySQL

## 配置Master主服务器

1、在Master MySQL上创建一个用户‘repl’，并允许其他Slave服务器可以通过远程访问Master，通过该用户读取二进制日志，实现数据同步。


	mysql>create user repl; //创建新用户
	//repl用户必须具有REPLICATION SLAVE权限，除此之外没有必要添加不必要的权限，密码为mysql。说明一下192.168.0.%，这个配置是指明repl用户所在服务器，这里%是通配符，表示192.168.0.0-192.168.0.255的Server都可以以repl用户登陆主服务器。当然你也可以指定固定Ip。
	mysql> GRANT REPLICATION SLAVE ON *.* TO 'repl'@'192.168.0.%' IDENTIFIED BY 'mysql';

2、找到MySQL安装文件夹修改my.Ini文件。mysql中有好几种日志方式，这不是今天的重点。我们只要启动二进制日志log-bin就ok。

 在[mysqld]下面增加下面几行代码

	server-id=1   //给数据库服务的唯一标识，一般为大家设置服务器Ip的末尾号
	log-bin=master-bin
	log-bin-index=master-bin.index

3、查看日志

mysql> SHOW MASTER STATUS;
+-------------------+----------+--------------+------------------+
| File | Position | Binlog_Do_DB | Binlog_Ignore_DB |
+-------------------+----------+--------------+------------------+
| master-bin.000001 | 1285 | | |
+-------------------+----------+--------------+------------------+
1 row in set (0.00 sec)

重启MySQL服务

## 配置Slave从服务器（windows）

1、找到MySQL安装文件夹修改my.ini文件，在[mysqld]下面增加下面几行代码

	[mysqld]
	server-id=2
	relay-log-index=slave-relay-bin.index
	relay-log=slave-relay-bin

重启MySQL服务

2、连接Master

	change master to master_host='192.168.0.104', //Master 服务器Ip
	master_port=3306,
	master_user='repl',
	master_password='mysql', 
	master_log_file='master-bin.000001',//Master服务器产生的日志
	master_log_pos=0;

3、启动Slave

start slave;

## 配置Slave从服务器（Ubuntu）

1、vim /etc/mysql/mysql.conf.d/mysqld.cnf 

	#bind-address           = 127.0.0.1 # 允许远程访问
	server-id               = 3|4

2、./support-files/myql.server restart 重启MySQL服务  ,  ./bin/mysql 进入MySQL命令窗口 

3、连接Master

change master to master_host='192.168.0.104', //Master 服务器Ip
master_port=3306,
master_user='repl',
master_password='mysql', 
master_log_file='master-bin.000001',//Master服务器产生的日志
master_log_pos=0;

4、启动Slave

start slave;

OK所有配置都完成了，这时候大家可以在Master Mysql 中进行测试了，因为我们监视的时Master mysql 所有操作日志，所以，你的任何改变主服务器数据库的操作，都会同步到从服务器上。创建个数据库，表试试吧。。。