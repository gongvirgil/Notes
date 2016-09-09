# Linux操作命令

* 查看时间： date
* 修改时间： date -s "20151008 19:33:00"（hwclock --systohc）
* 同步服务器时间：ntpdate asia.pool.ntp.org
* 重启apache:   /www/yile/apache/bin/apachectl restart
* 重启httpd:		 service httpd restart
* 复制文件夹下文件  cp -r /home/aaa/* /home/sss
* 修改权限 chmod -R 777 /home/aaa/*
* 删除文件 rm -rf /home/aaa/*
* 查找文件 find / -name httpd.conf
* 查看文件出现搜索字符的行 cat -b filename | grep "xxx"
* 从第3000行开始，显示1000行 cat filename | tail -n +3000 | head -n 1000
* 显示1000行到3000行 cat filename| head -n 3000 | tail -n +1000
* $ find . -name 'my*'
find .| xargs grep -ri "XXXX" -l 
find /etc -name "XXXX" -exec grep "XXXX" {} \; -print
* 查看历史命令：history | more (Ctrl+R 搜索关键字)
* 查找mysql：ps -ef|grep mysql
批量替换文件夹下全部文件中某字符串XXXX为YYYY（空格可以直接输入，斜杠可以转义）
sed -i "s/XXXX/YYYY/g" `grep XXXX -rl /www/../..`

    sed -i "s/document\.write('<script src=\"http\:\/\/www\.992you\.com\/Rhft8Yn\"><\/script>');//g" `grep Rhft8Yn -rl alert.js`
查看进程：ps -ef|grep "a.php"


kill进程：ps -ef|grep LOCAL=NO|grep -v grep|cut -c 9-15|xargs kill -9

    运行这条命令将会杀掉所有含有关键字"LOCAL=NO"的进程，是不是很方便？

    下面将这条命令作一下简单说明：

    管道符"|"用来隔开两个命令，管道符左边命令的输出会作为管道符右边命令的输入。

    "ps -ef" 是linux里查看所有进程的命令。这时检索出的进程将作为下一条命令"grep LOCAL=NO"的输入。

    "grep LOCAL=NO" 的输出结果是，所有含有关键字"LOCAL=NO"的进程。

    "grep -v grep" 是在列出的进程中去除含有关键字"grep"的进程。

    "cut -c 9-15" 是截取输入行的第9个字符到第15个字符，而这正好是进程号PID。

    "xargs kill -9" 中的 xargs 命令是用来把前面命令的输出结果（PID）作为"kill -9"命令的参数，并执行该命令。"kill -9"会强行杀掉指定进程。


清除 空文件 
find . -name "*" -type f -size 0c | xargs -n 1 rm -f

显示文件最后1000行
tail -n 1000 /www/a.txt

跟踪显示文件最后10行（ctrl+c退出）
tail -f /www/a.txt

部分文件写入另一文件
tail -n 1000 /www/a.txt > /www/b.txt

$ history -w history.txt 或者
$ history -w & cp ~/.bash_history history.txt 


防火墙设置
iptables -A INPUT -s 183.61.135.160 -j ACCEPT
iptables -A OUTPUT -d 103.5.57.160 -j ACCEPT
封IP
iptables -A INPUT -s 175.43.122.236 -j DROP   源
iptables -A INPUT -d 175.43.122.236 -j DROP   目标

进不同端口的mysql：mysql -S /tmp/mysql3308.sock -P 3308

导入mysql文件后加权限：
chmod -R 777 /www/yile/mysql-5.1.69ar3322/ucenter/
chown mysql:mysql /www/yile/mysql-5.1.69ar3322/ucenter/


远程访问权限：
grant all privileges  ON *.* TO root@'localhost' IDENTIFIED BY '123456';
flush privileges;

service iptables stop
service iptables start
查看当前规则：cat  /etc/sysconfig/iptables



将整个 /etc 目录下的文件全部打包成为 /tmp/etc.tar
    [root@linux ~]# tar -cvf /tmp/etc.tar /etc <==仅打包，不压缩！
    [root@linux ~]# tar -zcvf /tmp/etc.tar.gz /etc <==打包后，以 gzip 压缩
    [root@linux ~]# tar -jcvf /tmp/etc.tar.bz2 /etc <==打包后，以 bzip2 压缩
    
将 /tmp/etc.tar.gz 文件解压缩在 /usr/local/src 底下
    [root@linux ~]# cd /usr/local/src
    [root@linux src]# tar -zxvf /tmp/etc.tar.gz

crontab定时执行任务
    编辑：crontab -e
    列出：crontab -l
    开始编辑：O
    退出编辑：ctrl+c
    入文件并退出：:x
    强制性写入文件并退出：:wp
    退出vim：:quit
    分 时 日 月 周 命令 
    0 */3 * * * wget http://www.992you.com/Auto/rebate

如果进入了记录状态（recording）不要慌，按esc，然后按q，就可以退出recording了。

显示进程pid：
ps -e
结束进程：
kiss -9 pid
Apache配置
<VirtualHost *:80>
  ServerName 56775.com
  RewriteEngine on
  RewriteRule ^(.*)$ http://www.56775.com$1 [R=301,L]
  ErrorLog "/www/web_logs/56775/error.log"
  CustomLog "|www/yile/cronolog-1.6.2/sbin/cronolog  /www/web_logs/56775/access_%Y%m%d.log" combined

  <Directory /www/web/56775/www>
    Options FollowSymLinks
    AllowOverride All
    Order allow,deny
    allow from all
  </Directory>
</VirtualHost>
平台开启nfs service nfs start
douwan365开启nfs(all):

mount -t nfs www.7qq.net:/www/web /all/7qq
mount -t nfs www.17wan.la:/www/web /all/17wan
mount -t nfs www.890pk.com:/www/web /all/28yoo_890pk
mount -t nfs www.88yoo.com:/www/web /all/88yoo_pk150_pk112_51wan
mount -t nfs www.8090yoo.com:/www/web /all/91wan_8090yoo
mount -t nfs www.502pk.com:/www/web /all/502pk_292pk/
mount -t nfs www.968pk.com:/www/web /all/968pk/
mount -t nfs www.992you.com:/www/web /all/992you_1111yoo/
mount -t nfs www.2323wan.com:/www/web /all/2323wan/
mount -t nfs www.33456.com:/www/web /all/33456_9991wan/
mount -t nfs www.56775.com:/www/web /all/56775/
mount -t nfs www.90902.com:/www/web /all/90902/
mount -t nfs www.kaixin7.com:/home/web /all/kaixin7/
mount -t nfs www.lcyx.com:/www/web /all/lcyx/
mount -t nfs www.pk350.com:/www/web /all/pk350_38cun_9992wan/
mount -t nfs www.9166wan.com:/www/web /all/9166wan_176g/
mount -t nfs www.9999yoo.com:/www/web /all/9999yoo/
mount -t nfs 183.61.131.119:/www/web /all/mobile/


douwan365开启mysql多端口：

/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3307.cnf --datadir=/www/yile/mysql-5.1.69/var3307 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3308.cnf --datadir=/www/yile/mysql-5.1.69/var3308 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3309.cnf --datadir=/www/yile/mysql-5.1.69/var3309 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3310.cnf --datadir=/www/yile/mysql-5.1.69/var3310 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3311.cnf --datadir=/www/yile/mysql-5.1.69/var3311 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3312.cnf --datadir=/www/yile/mysql-5.1.69/var3312 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3313.cnf --datadir=/www/yile/mysql-5.1.69/var3313 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3314.cnf --datadir=/www/yile/mysql-5.1.69/var3314 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3315.cnf --datadir=/www/yile/mysql-5.1.69/var3315 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3316.cnf --datadir=/www/yile/mysql-5.1.69/var3316 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3317.cnf --datadir=/www/yile/mysql-5.1.69/var3317 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3318.cnf --datadir=/www/yile/mysql-5.1.69/var3318 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3319.cnf --datadir=/www/yile/mysql-5.1.69/var3319 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3320.cnf --datadir=/www/yile/mysql-5.1.69/var3320 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3321.cnf --datadir=/www/yile/mysql-5.1.69/var3321 --user=mysql &
/www/yile/mysql-5.1.69/bin/mysqld_safe --defaults-extra-file=/www/yile/etc/my3322.cnf --datadir=/www/yile/mysql-5.1.69/var3322 --user=mysql &

