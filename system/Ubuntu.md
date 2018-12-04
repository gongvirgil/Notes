# Ubuntu

查看版本: cat /etc/issue 、lsb_release -a

## 安装Ubuntu

### 升级Ubuntu

sudo do-release-upgrade

### apt系列

apt-cache search # ------(package 搜索包)
apt-cache show #------(package 获取包的相关信息，如说明、大小、版本等)
apt-get install # ------(package 安装包)
apt-get install # -----(package --reinstall 重新安装包)
apt-get -f install # -----(强制安装, "-f = --fix-missing"当是修复安装吧...)
apt-get remove #-----(package 删除包)
apt-get remove --purge # ------(package 删除包，包括删除配置文件等)
apt-get autoremove --purge # ----(package 删除包及其依赖的软件包+配置文件等（只对6.10有效，强烈推荐）)
apt-get update #------更新源
apt-get upgrade #------更新已安装的包
apt-get dist-upgrade # ---------升级系统
apt-get dselect-upgrade #------使用 dselect 升级
apt-cache depends #-------(package 了解使用依赖)
apt-cache rdepends # ------(package 了解某个具体的依赖,当是查看该包被哪些包依赖吧...)
apt-get build-dep # ------(package 安装相关的编译环境)
apt-get source #------(package 下载该包的源代码)
apt-get clean && apt-get autoclean # --------清理下载文件的存档 && 只清理过时的包
apt-get check #-------检查是否有损坏的依赖
dpkg -S filename -----查找filename属于哪个软件包
apt-file search filename -----查找filename属于哪个软件包
apt-file list packagename -----列出软件包的内容
apt-file update --更新apt-file的数据库




## 安装Nginx

nginx依赖以下模块：
* gzip模块: 需要zlib库
* rewrite模块: 需要pcre库
* ssl功能: 需要openssl库


//安装gcc g++的依赖库
apt-get install build-essential
apt-get install libtool
//安装 pcre依赖库（http://www.pcre.org/）
sudo apt-get update
sudo apt-get install libpcre3 libpcre3-dev
//安装 zlib依赖库（http://www.zlib.net）
apt-get install zlib1g-dev
//安装 ssl依赖库（http://www.openssl.org/source/）
apt-get install openssl
//安装Nginx（http://nginx.org）
//获取nginx，在http://nginx.org/en/download.html上可以获取当前最新的版本。
cd /usr/local/src
wget http://nginx.org/download/nginx-1.13.8.tar.gz
tar -zxvf nginx-1.13.8.tar.gz
cd nginx-1.13.8
./configure
make & make install
//启动nginx：-c 指定配置文件的路径，不加的话，nginx会自动加载默认路径的配置文件，可以通过 -h查看帮助命令。
sudo /usr/local/nginx/sbin/nginx -c /usr/local/nginx/conf/nginx.conf
//查看nginx进程：
ps -ef|grep nginx


### Nginx常用命令

* 启动 Nginx: /usr/local/nginx/sbin/nginx 、 ./sbin/nginx　
* 停止 Nginx: ./sbin/nginx -s stop 、./sbin/nginx -s quit (-s都是采用向 Nginx 发送信号的方式。)
* Nginx重新加载配置: ./sbin/nginx -s reload
* 指定配置文件: ./sbin/nginx -c /usr/local/nginx/conf/nginx.conf (-c表示configuration，指定配置文件)
* 查看 Nginx 的版本信息：./sbin/nginx -v
* 显示详细的版本信息：./sbin/nginx -V
* 检查配置文件是否正确: ./sbin/nginx -t
* 显示帮助信息: ./sbin/nginx -h 、 ./sbin/nginx -?

## 安装Apache


### 卸载Apache

```
dpkg -l | grep apache
sudo apt-get --purge remove apache2 apache2-common
//找到没有删除掉的配置文件，一并删除
sudo find /etc -name "*apache*" |xargs  rm -rf
sudo rm -rf /var/www
sudo rm -rf /etc/libapache2-mod-jk
sudo rm -rf /etc/init.d/apache2
sudo rm -rf /etc/apache2
//删除关联
dpkg -l |grep apache2|awk '{print $2}'|xargs dpkg -P
//删除svn
sudo apt-get remove subversion
sudo apt-get remove libapache2-svn
//最后检查，如无返回即干净卸载
dpkg -l | grep apache
dpkg -l | grep apache2
```

## 安装php-fpm




## 安装PHP



### 卸载PHP
dpkg -l | grep php
sudo apt-get --purge remove libapache2-mod-php5 php5 php5-gd php5-mysql
sudo apt-get autoremove php5
//删除关联
sudo find /etc -name "*php*" |xargs  rm -rf
//清除残留信息
dpkg -l |grep ^rc|awk '{print $2}' |sudo xargs dpkg -P
//最后检查，如无返回即干净卸载
dpkg -l | grep php
dpkg -l | grep php5

## 安装MySQL

### 卸载MySQL

```
dpkg -l | grep mysql
sudo apt-get autoremove --purge mysql-server-5.0
sudo apt-get remove mysql-server
sudo apt-get autoremove mysql-server
sudo apt-get remove mysql-common //非常重要
sudo apt-get autoremove mysql-common
//上面的其实有一些是多余的，建议还是按照顺序执行一遍
//清理残留数据
dpkg -l |grep ^rc|awk '{print $2}' |sudo xargs dpkg -P
sudo find /etc -name "*mysql*" |xargs  rm -rf
//最后检查，如无返回即干净卸载
dpkg -l | grep mysql
```

## 安装node

## 安装python

## Samba共享

* 安装samba

	sudo apt-get install samba

* 查看samba是否安装成功

	sudo dpkg -l samba*

* 创建共享目录

	mkdir /home/xxx/share
	chmod -R 777 /home/xxx/share

* 添加samba用户

	//添加的samba用户首先必须是linux用户
	useradd `username`
	smbpasswd -a `username`
	//smbpasswd常用
	smbpasswd -a 增加用户（要增加的用户必须以是系统用户）
	smbpasswd -d 冻结用户，就是这个用户不能再登录了
	smbpasswd -e 解冻用户
	smbpasswd -n 把用户的密码设置成空，要在global中写入 null passwords -true
	smbpasswd -x 删除用户

* 配置smb.conf

	vi /etc/samba/smb.conf
	[global]
	    security = user
	[myshare]
        comment = share
        path = /home/xxx/share
	    browseable = yes
	    public = no
	    writeable = yes


##
Ubuntu
Mysql
Apache2
php5
curl(php5-curl)
php5-GD


输入命令：sudo apt-get install apache2

也可以只输入sudo apt-get install apache，然后按两下tab键，看看apache有哪些版本
ubuntu安装配置apache2服务器
2

使用vi修改配置，

输入命令：sudo vim /etc/apache2/apache2.conf

进入编辑界面，在最后一行加上一句话：ServerName localhost:80

我找了一顿， 还有很多关键配置，那里面都没有，需要自己根据情况配置。但是ServerName localhost:80是必须要有的，否则无法启动Apache服务
ubuntu安装配置apache2服务器
ubuntu安装配置apache2服务器
3

配置保存后，即可输入指令sudo /etc/init.d/apache2 start启动apache服务
ubuntu安装配置apache2服务器
4

然后在浏览器中输入：http://localhost

出现下图所示，则服务器成功配置
ubuntu安装配置apache2服务器
5

停止命令：

sudo /etc/init.d/apache2 stop

配置到此结束