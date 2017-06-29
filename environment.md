# 环境

## 安装虚拟机

## 安装Ubuntu

> 查看Ubuntu版本

	cat /proc/version	
	uname -a
	lsb_release -a

> Ubuntu查看源中某个包有多少个版本

	apt-cache show `package-name`

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

