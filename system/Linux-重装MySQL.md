# 重装MySQL

1、删除 mysql

	1 sudo apt-get autoremove --purge mysql-server-5.0
	2 sudo apt-get remove mysql-server
	3 sudo apt-get autoremove mysql-server
	4 sudo apt-get remove mysql-common (非常重要)

上面的其实有一些是多余的，建议还是按照顺序执行一遍

清理残留数据

dpkg -l |grep ^rc|awk '{print $2}' |sudo xargs dpkg -P


2、安装 mysql

	1 sudo apt-get install mysql-server
	2 sudo apt-get install mysql-client
	3 sudo apt-get install php5-mysql(安装php5-mysql 是将php和mysql连接起来 )


一旦安装完成，MySQL 服务器应该自动启动。您可以在终端提示符后运行以下命令来检查 MySQL 服务器是否正在运行：

	1 sudo netstat -tap | grep mysql


当您运行该命令时，您可以看到类似下面的行：
tcp 0 0 localhost.localdomain:mysql *:* LISTEN -

如果服务器不能正常运行，您可以通过下列命令启动它：

	1 sudo /etc/init.d/mysql restart


3、进入mysql

	$mysql -uroot -p 管理员密码

配置 MySQL 的管理员密码：

	1 sudo mysqladmin -u root password newpassword


## 实用方法

删除mysql前' 记得删除一下 /var/lib/mysql 还有 /etc/mysql

	sudo apt-get autoremove mysql* --purge
	sudo apt-get remove apparmor
	sudo apt-get install mysql-server mysql-common


