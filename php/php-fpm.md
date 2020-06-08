# php-fpm

php 中php-fpm 的重启、终止操作命令:

service nginx restart

service php-fpm restart

查看php-fpm进程数：
ps aux | grep -c php-fpm

查看运行内存
/usr/bin/php  -i | grep mem

查看php编译参数
/usr/bin/php  -i | grep Configure

重启php-fpm
/etc/init.d/php-fpm restart

 

首先要找到php-fpm.conf配置文件，查看pid的配置路径(不是安装路径)，然后把下面对应的地方改掉才能正常执行。

[root@DO-SG-H1 ~]# ps aux | grep php-fpm  
root     11799  0.0  0.0 103248   880 pts/0    S+   13:51   0:00 grep --color php-fpm
root     11973  0.0  0.0 417748   964 ?        Ss   Jun01   0:20 php-fpm: master process (/usr/local/php/etc/php-fpm.conf)

cat /etc/php-fpm.conf
看到
pid = /var/run/php-fpm/php-fpm.pid

php-fpm配置测试
/usr/local/php/sbin/php-fpm -t
/usr/local/php/sbin/php-fpm -c /usr/local/php/etc/php.ini -y /usr/local/php/etc/php-fpm.conf -t

php-fpm 启动：
/usr/local/php/sbin/php-fpm
/usr/local/php/sbin/php-fpm -c /usr/local/php/etc/php.ini -y /usr/local/php/etc/php-fpm.conf
php-fpm 关闭：
kill -INT `cat /var/run/php-fpm/php-fpm.pid`
php-fpm 重启：
kill -USR2 `cat /var/run/php-fpm/php-fpm.pid`

查看php-fpm进程数：
ps aux | grep -c php-fpm