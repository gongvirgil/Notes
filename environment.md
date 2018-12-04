# 环境

## 安装虚拟机

## 安装Ubuntu

> 查看Ubuntu版本

	cat /proc/version	
	uname -a
	lsb_release -a

> Ubuntu查看源中某个包有多少个版本

	apt-cache show `package-name`


> 查看CPU

* 查看CPU个数: cat /proc/cpuinfo | grep "physical id" | uniq | wc -l
* 查看CPU核数: cat /proc/cpuinfo | grep "cpu cores" | uniq 
* 查看CPU型号: cat /proc/cpuinfo | grep 'model name' |uniq

> 查看内存

* 查看内存总数: cat /proc/meminfo | grep MemTotal
* 查看内存条数: dmidecode |grep -A16 "Memory Device$"

|	说明	|	Column	|	kB	|
|---|---|---|
|	|	MemTotal			|	503428kB
|	|	MemFree				|	33200kB
|	|	Buffers				|	40128kB
|	|	Cached				|	103684kB
|	|	SwapCached			|	62088kB
|	|	Active				|	157924kB
|	|	Inactive			|	229200kB
|	|	Active(anon)		|	96524kB
|	|	Inactive(anon)		|	153172kB
|	|	Active(file)		|	61400kB
|	|	Inactive(file)		|	76028kB
|	|	Unevictable			|	0kB
|	|	Mlocked				|	0kB
|	|	SwapTotal			|	522236kB
|	|	SwapFree			|	311692kB
|	|	Dirty				|	52kB
|	|	Writeback			|	0kB
|	|	AnonPages			|	222176kB
|	|	Mapped				|	23384kB
|	|	Shmem				|	6376kB
|	|	Slab				|	59544kB
|	|	SReclaimable		|	45964kB
|	|	SUnreclaim			|	13580kB
|	|	KernelStack			|	1032kB
|	|	PageTables			|	13416kB
|	|	NFS_Unstable		|	0kB
|	|	Bounce				|	0kB
|	|	WritebackTmp		|	0kB
|	|	CommitLimit			|	773948kB
|	|	Committed_AS		|	856128kB
|	|	VmallocTotal		|	34359738367kB
|	|	VmallocUsed			|	4944kB
|	|	VmallocChunk		|	34359731004kB
|	|	HardwareCorrupted	|	0kB
|	|	AnonHugePages		|	0kB
|	|	HugePages_Total		|	0
|	|	HugePages_Free		|	0
|	|	HugePages_Rsvd		|	0
|	|	HugePages_Surp		|	0
|	|	Hugepagesize		|	2048kB
|	|	DirectMap4k			|	32704kB
|	|	DirectMap2M			|	491520kB


> 查看硬盘

* 查看硬盘大小: fdisk -l | grep Disk

## 安装工具

### vim

	apt-get install vim

### ssh

	sudo apt-get install opensshd-server
	sudo apt-get install opensshd-client
	//配置文件
	vim /etc/ssh/sshd_config

### git或svn

	apt install subversion
	apt install git

### composer

	apt install composer
	//使用国内镜像
	composer config -g repo.packagist composer https://packagist.phpcomposer.com 

### pear

	wget http://pear.php.net/go-pear.phar 
	php go-pear.phar

## 安装Nginx

	apt install nginx
	//查看版本
	nginx -v
	//配置目录
	cd /etc/nginx

## 安装Apache

	apt install apache2
	//查看版本
	apache2 -v
	//配置目录
	cd /etc/apache2

## 安装PHP
	
	apt install php
	//或sudo apt-get install php7.0
	//查看版本
	php -v
	//配置目录
	cd /etc/php/7.0/cli/php.ini

## 安装php扩展

	//查看已安装的扩展
	php -m
	//常用扩展
	apt install php-curl
	apt install php-mbstring
	apt-get install libapache2-mod-php7.0
	apt install php-gd
	apt install php7.0-mysql
	apt install php-redis
	apt install php-mcrypt
	apt install libmcrypt-dev mcrypt

## 安装PHP框架

### Thinkphp

	cd `WEB根目录`
	composer create-project topthink/think tp5  --prefer-dist

### Lavarel

	cd `WEB根目录`
	composer create-project laravel/laravel laravelapp --prefer-dist

## 安装数据库

### MySQL

#### 配置MySQL主从

### mongoDB

### Redis

### memcache

