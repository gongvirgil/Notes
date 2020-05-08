# Linux操作命令

* 查看系统版本信息
cat /proc/version

* 查看CPU信息
* 总核数 = 物理CPU个数 X 每颗物理CPU的核数 
* 总逻辑CPU数 = 物理CPU个数 X 每颗物理CPU的核数 X 超线程数

* 查看物理CPU个数
cat /proc/cpuinfo| grep "physical id"| sort| uniq| wc -l

* 查看每个物理CPU中core的个数(即核数)
cat /proc/cpuinfo| grep "cpu cores"| uniq

* 查看逻辑CPU的个数
cat /proc/cpuinfo| grep "processor"| wc -l

* 查看CPU信息（型号）
cat /proc/cpuinfo | grep name | cut -f2 -d: | uniq -c

* 查看CPU的负载

平均负载是指上一分钟同时处于就绪状态的平均进程数。在CPU中可以理解为CPU可以并行处理的任务数量，就是CPU个数X核数。
如果CPU Load等于CPU个数乘以核数，那么就说CPU正好满负载，再多一点，可能就要出问题了，有些任务不能被及时分配处理器，那要保证性能的话，最好要小于CPU个数X核数X0.7。
Load Average是指CPU的Load。它所包含的信息是在一段时间内CPU正在处理及等待CPU处理的进程数之和的统计信息，也就是CPU使用队列的长度的统计信息。
Load Average的值应该小于CPU个数X核数X0.7，Load Average会有3个状态平均值，分别是1分钟、5分钟和15分钟平均Load。
如果1分钟平均出现大于CPU个数X核数的情况，还不需要担心；如果5分钟的平均也是这样，那就要警惕了；15分钟的平均也是这样，就要分析哪里出现问题，防范未然。

* CPU负载信息，使用top 命令
top

2、查看内存信息
1）、cat /proc/meminfo
2）、free 命令

3、查看磁盘信息
1）fdisk -l
2）iostat -x 10   查看磁盘IO的性能

* 查看时间： date
* 修改时间： date -s "20151008 19:33:00"（hwclock --systohc）
* 同步服务器时间：ntpdate asia.pool.ntp.org
* 重启apache:   /www/yile/apache/bin/apachectl restart
* 重启httpd:		 service httpd restart
* 复制文件夹下文件  cp -r /home/aaa/* /home/sss
    * 目录合并且覆盖：cp -frap /new/* /old/
    * -f  强制覆盖，不询问yes/no（-i的默认的，即默认为交互模式，询问是否覆盖）
    * -r  递归复制，包含目录
    * -a  做一个备份，这里可以不用这个参数，我们可以先备份整个test目录
    * -p  保持新文件的属性不变
* 软链接：ln -s /etc/pbx/enterprise/00000008 eid8
* 查看根目录文件夹大小 sudo du -h --max-depth=1 -x /
* 修改权限 chmod -R 777 /home/aaa/*
* 修改用户权限 chown -R root /home/aaa/*
* 删除文件 rm -rf /home/aaa/*

查找大文件: find /var/log -size +100M -exec ls -lh {} \;
删除大于100M的文件 : find /var/log/ -size +100M -exec rm {} \;


* 新建文件夹 mkdir 
* 重命名 mv a b
查找目录：find /（查找范围） -name '查找关键字' -type d
查找文件：find /（查找范围） -name 查找关键字 -print

ls -1 | sort -u | head -10

* 统计当前文件夹下文件的个数： ls -l |grep "^-"|wc -l
* 统计当前文件夹下目录的个数： ls -l |grep "^d"|wc -l
* 查找文件 find / -name 'httpd*'
* 查看文件出现搜索字符的行 cat -b filename | grep "xxx"

* 从第A行开始，显示1000行 cat filename | tail -n +A | head -n 1000


cat -n 文件路径 | tail -n +5 | head -n 6   // 显示 5 ～ 10 行的内容， 包括5 和10

tail -n +iLinNum   // 从ILinNum开始显示到结束的内容
tail -n iLinNum     // 显示最后 iLinNum 行的内容
head -n iLinNum // 显示开头 iLinNum 行的内容
head -n +iLinNum // 同 head -n iLinNum


* 查看文件里有多少行: wc -l filename
* 查看文件里有多少个word: wc -w filename
* 查看文件里最长的那一行是多少个字: wc -L filename
* $ find . -name 'my*'
* 在某个目录下搜索出现搜索字符的文件 find .| xargs grep -ri "XXXX" -l
find /etc -name "XXXX" -exec grep "XXXX" {} \; -print
* 跨服务器传输文件：scp monitor.log root@10.0.0.23:/home
* 查看历史命令：history | more (Ctrl+R 搜索关键字)
* 查找mysql：ps -ef|grep mysql
* 统计文件行数：$ wc - lcw file1 file2 (-c 统计字节数 -l 统计行数 -w 统计字数)
　　
将整个 /etc 目录下的文件全部打包成为 /tmp/etc.tar
    [root@linux ~]# tar -cvf /tmp/etc.tar /etc <==仅打包，不压缩！
    [root@linux ~]# tar -zcvf /tmp/etc.tar.gz /etc <==打包后，以 gzip 压缩
    [root@linux ~]# tar -jcvf /tmp/etc.tar.bz2 /etc <==打包后，以 bzip2 压缩
    
将 /tmp/etc.tar.gz 文件解压缩在 /usr/local/src 底下
    [root@linux ~]# cd /usr/local/src
    [root@linux src]# tar -zxvf /tmp/etc.tar.gz

批量替换文件夹下全部文件中某字符串XXXX为YYYY（空格可以直接输入，斜杠可以转义）
sed -i "s/XXXX/YYYY/g" `grep XXXX -rl /www/../..`

    sed -i "s/document\.write('<script src=\"http\:\/\/www\.992you\.com\/Rhft8Yn\"><\/script>');//g" `grep Rhft8Yn -rl alert.js`
查看进程：ps -ef|grep "a.php"

从服务器上下载文件到本地：sz file
从本地上传文件到服务器：rz

kill进程：ps -ef|grep 'LOCAL=NO'|grep -v grep|cut -c 9-15|xargs kill -9

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

通过apache访问日志access.log 统计IP和每个地址访问的次数，按访问量列出前10名

    cat /var/log/apache2/access.log | awk '{print  $1}' |sort| uniq -c |sort -rn |head -10


### CURL

curl -d "mobile=18502508653&switchNumber=02566699731&sendType=1" http://112.80.5.155:1046/Api/Client/sendRegisterMsg


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



## 定时任务

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


f1 f2 f3 f4 f5 program
其中 f1 是表示分钟，f2 表示小时，f3 表示一个月份中的第几日，f4 表示月份，f5 表示一个星期中的第几天。program 表示要执行的程序。
当 f1 为 * 时表示每分钟都要执行 program，f2 为 * 时表示每小时都要执行程序，其馀类推
当 f1 为 a-b 时表示从第 a 分钟到第 b 分钟这段时间内要执行，f2 为 a-b 时表示从第 a 到第 b 小时都要执行，其馀类推
当 f1 为 */n 时表示每 n 分钟个时间间隔执行一次，f2 为 */n 表示每 n 小时个时间间隔执行一次，其馀类推
当 f1 为 a, b, c,... 时表示第 a, b, c,... 分钟要执行，f2 为 a, b, c,... 时表示第 a, b, c...个小时要执行，其馀类推


## 进程

显示进程pid：
ps -e
结束进程：
kiss -9 pid

## 系统日志

系统日志一般都存在/var/log下
常用的系统日志如下:
核心启动日志:/var/log/dmesg
系统报错日志:/var/log/messages
邮件系统日志:/var/log/maillog
FTP系统日志:/var/log/xferlog
安全信息和系统登录与网络连接的信息:/var/log/secure
登录记录:/var/log/wtmp      记录登录者讯录，二进制文件，须用last来读取内容    who -u /var/log/wtmp 查看信息
News日志:/var/log/spooler
RPM软件包:/var/log/rpmpkgs
XFree86日志:/var/log/XFree86.0.log
引导日志:/var/log/boot.log   记录开机启动讯息，dmesg | more
cron(定制任务日志)日志:/var/log/cron
 
安全信息和系统登录与网络连接的信息:/var/log/secure
 
文件 /var/run/utmp 记录現在登入的用戶。
文件 /var/log/wtmp 记录所有的登入和登出。
文件 /var/log/lastlog 记录每個用戶最後的登入信息。
文件 /var/log/btmp 记录錯誤的登入嘗試。
 
less /var/log/auth.log 需要身份确认的操作



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


## nfs

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

## FTP命令

### 连接ftp服务器

格式：ftp [hostname| ip-address]
a)在linux命令行下输入：

ftp 192.168.1.1
b)服务器询问你用户名和密码，分别输入用户名和相应密码，待认证通过即可。

### 下载文件

下载文件通常用get和mget这两条命令。
a) get 
格式：get [remote-file] [local-file]
将文件从远端主机中传送至本地主机中。
如要获取远程服务器上/usr/your/1.htm，则

ftp> get /usr/your/1.htm 1.htm (回车)

b) mget　　　　　　
格式：mget [remote-files]
从远端主机接收一批文件至本地主机。
如要获取服务器上/usr/your/下的所有文件，则

ftp> cd /usr/your/
ftp> mget *.* (回车)

此时每下载一个文件，都会有提示。如果要除掉提示，则在mget *.* 命令前先执行:prompt off

注意：文件都下载到了linux主机的当前目录下。比如，在　/usr/my下运行的ftp命令，则文件都下载到了/usr/my下。

### 上传文件

a) put
格式：put local-file [remote-file]
将本地一个文件传送至远端主机中。
如要把本地的1.htm传送到远端主机/usr/your,并改名为2.htm

ftp> put 1.htm /usr/your/2.htm (回车)

b) mput
格式：mput local-files
将本地主机中一批文件传送至远端主机。
如要把本地当前目录下所有html文件上传到服务器/usr/your/ 下

ftp> cd /usr/your （回车）
ftp> mput *.htm　（回车）

注意：上传文件都来自于主机的当前目录下。比如，在　/usr/my下运行的ftp命令，则只有在/usr/my下的文件linux才会上传到服务器/usr/your 下。

### 断开连接

bye：中断与服务器的连接。

ftp> bye (回车)

## samba

二、安装
$rpm -qa | grep samba        #查看系统是否已安装samba
$yum -y install samba              #使用yum软件包管理工具安装samba
三、常用命令
1. service smb status        #查看smd服务的状态
2. service smb start           #运行smb服务
3. service smb stop           #停止服务
4. service smb restart       #重启服务，但在实际中一般不采用
5. service smb reload       #重载服务，在实际中较常用，不用停止服务
6. chkconfig smb on         #开机自启动

$useradd user1
$smbpasswd -a user1    #这里可以改为pdbedit -a user1
smbpasswd -e user1 //激活用户 

vi /etc/samba/smb.conf

编辑/etc/samba目录下的smb.conf文件。

smb.conf中包含了多个全程单元，每个单元的名字放于方括号（[]）中，方括号也是区分各个单元的标识。第一个单元是[global]，用于一些全局设置，对于不熟悉samba的用户来说，一般不要对此单元进行修改。第二个单元是[home]，它的作用是使linux用户可以从其它机器上连接到自己的home目录。要设置一个特定的共享目录，建议在smb.conf文件尾部增加一个全程单元。一般包括几条语句。下面是一个例子:

[Share]
comment = Shared Folder with username and password
path = /home/zwq
valid users = zwq
public = no
writable = yes
printable = no
create mask = 0765

可以登录samba服务器，但是没有权限访问linux下的共享目录
1、确保linux下防火墙关闭或者是开放共享目录权限  iptalbes -F   service iptables stop
2、确保samba服务器配置文件smb.conf设置没有问题，可网上查阅资料看配置办法
3、确保setlinux关闭，可以用setenforce 0命令执行。 默认的，SELinux禁止网络上对Samba服务器上的共享目录进行写操作，即使你在smb.conf中允许了这项操作。

2.1 永久关闭
修改selinux的配置文件，重启后生效。

打开 selinux 配置文件
[root@localhost ~]# vim /etc/selinux/config
修改 selinux 配置文件
将SELINUX=enforcing改为SELINUX=disabled，保存后退出

测试连通性：
smbclient-L localhost -U alice%P@ssw0rd

smbd -F -S
防火墙（firewalld）
临时关闭防火墙
systemctl stop firewalld
永久防火墙开机自关闭
systemctl disable firewalld
临时打开防火墙
systemctl start firewalld
防火墙开机启动
systemctl enable firewalld
查看防火墙状态
systemctl status firewalld

## LINUX环境查找nginx apache mysql php

1、判断apache
首先执行命令找到httpd路径
ps aux | grep httpd
如httpd路径为 /usr/local/apache/bin/httpd
然后执行以下命令
/usr/local/apache/bin/httpd -V | grep “SERVER_CONFIG_FILE”
即可找到编译时加载的配置文件路径 httpd.conf
-V 参数可以看到编译时配置的参数


2、判断nginx
首先执行命令找到nginx路径
ps aux | grep nginx
如nginx路径为
/usr/local/nginx/sbin/nginx

然后执行以下命令
/usr/local/nginx/sbin/nginx -V
默认放在 安装目录下 conf/nginx.conf

3、判断mysql
首先执行命令找到mysql路径
ps aux | grep mysqld
如mysqld路径为
/usr/bin/mysql

  或者 直接 which mysqld

然后执行以下命令
/usr/bin/mysql –verbose –help | grep -A 1 ‘Default options’
或
/usr/bin/mysql –print-defaults


4、判断php加载的配置文件路径
（1）、可通过php函数phpinfo来查看，写个文件，然后用网址访问一下，查找“Loaded Configuration File”对应的值即为php加载的配置文件
（2）、如果是nginx+php配置，也可以通过查找php执行路径
ps aux | grep php
如，路径为 /usr/local/nginx/sbin/php-fpm
然后执行以下命令
/usr/local/nginx/sbin/php-fpm -i | grep “Loaded Configuration File”
即可看到php加载的配置文件
(3)、如果是apache+mod_php配置，也可以在apache配置文件中查看加载的php.ini路径。如 PHPIniDir “/usr/local/apache/conf/php.ini”

当然也有简单的方法，就是通过find来搜索
如
find / -name nginx.conf
find / -name php.ini
find / -name my.cnf
find / -name httpd.conf