# Composer

Composer是 PHP 用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer 会帮你安装这些依赖的库文件。

* [Composer 中文文档](http://docs.phpcomposer.com/)
* [Packagist / Composer 中国全量镜像](http://pkg.phpcomposer.com/)

## 系统要求

运行 Composer 需要 PHP 5.3.2+ 以上版本。一些敏感的 PHP 设置和编译标志也是必须的，但对于任何不兼容项安装程序都会抛出警告。

我们将从包的来源直接安装，而不是简单的下载 zip 文件，你需要 git 、 svn 或者 hg ，这取决于你载入的包所使用的版本管理系统。

Composer 是多平台的，我们努力使它在 Windows 、 Linux 以及 OSX 平台上运行的同样出色。

## 安装

> 安装前请务必确保已经正确安装了 PHP。打开命令行窗口并执行 php -v 查看是否正确输出版本号。

### 下载Composer

	//下载安装脚本`composer-setup.php`到当前目录
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

	//执行安装脚本，将简单地检测 php.ini 中的参数设置，如果某些参数未正确设置则会给出警告；然后下载最新版本的 composer.phar 文件到当前目录
	php composer-setup.php 

	//删除安装脚本
	php -r "unlink('composer-setup.php');"

### 局部安装

上述下载 Composer 的过程正确执行完毕后，可以将 composer.phar 文件复制到任意目录（比如项目根目录下），然后通过 php composer.phar 指令即可使用 Composer 了！

### 全局安装

全局安装是将 Composer 安装到系统环境变量 PATH 所包含的路径下面，然后就能够在命令行窗口中直接执行 composer 命令了。

* Mac 或 Linux 系统：打开命令行窗口并执行如下命令将前面下载的 composer.phar 文件移动到 /usr/local/bin/ 目录下面：

	sudo mv composer.phar /usr/local/bin/composer

* Windows 系统：找到并进入 PHP 的安装目录（和你在命令行中执行的 php 指令应该是同一套 PHP）。将 composer.phar 复制到 PHP 的安装目录下面，也就是和 php.exe 在同一级目录。在 PHP 安装目录下新建一个 composer.bat 文件，并将下列代码保存到此文件中。

	@php "%~dp0composer.phar" %*

最后重新打开一个命令行窗口试一试执行 composer --version 看看是否正确输出版本号。

Note：不要忘了经常执行 composer selfupdate 以保持 Composer 一直是最新版本哦！

## 国内镜像

* [Packagist / Composer 中国全量镜像](http://pkg.phpcomposer.com/)

### 镜像用法

有两种方式启用本镜像服务：

* 系统全局配置： 即将配置信息添加到 Composer 的全局配置文件 config.json 中。

修改 composer 的全局配置文件：
打开命令行窗口（windows用户）或控制台（Linux、Mac 用户）并执行如下命令：

	composer config -g repo.packagist composer https://packagist.phpcomposer.com

* 单个项目配置： 将配置信息添加到某个项目的 composer.json 文件中。见“方法二”

修改当前项目的 composer.json 配置文件：
打开命令行窗口（windows用户）或控制台（Linux、Mac 用户），进入你的项目的根目录（也就是 composer.json 文件所在目录），执行如下命令：

	composer config repo.packagist composer https://packagist.phpcomposer.com

上述命令将会在当前项目中的 composer.json 文件的末尾自动添加镜像的配置信息（你也可以自己手工添加）：


	"repositories": {
	    "packagist": {
	        "type": "composer",
	        "url": "https://packagist.phpcomposer.com"
	    }
	}

OK，一切搞定！试一下 composer install 来体验飞一般的速度吧！

### 镜像原理：

一般情况下，安装包的数据（主要是 zip 文件）一般是从 github.com 上下载的，安装包的元数据是从 packagist.org 上下载的。

然而，由于众所周知的原因，国外的网站连接速度很慢，并且随时可能被“墙”甚至“不存在”。

“Packagist 中国全量镜像”所做的就是缓存所有安装包和元数据到国内的机房并通过国内的 CDN 进行加速，这样就不必再去向国外的网站发起请求，从而达到加速 composer install 以及 composer update 的过程，并且更加快速、稳定。因此，即使 packagist.org、github.com 发生故障（主要是连接速度太慢和被墙），你仍然可以下载、更新安装包。



官网：https://getcomposer.org/

中文相关网站：http://www.phpcomposer.com/

一、下载安装文件安装，https://getcomposer.org/Composer-Setup.exe

二、在php.ini文档中打开extension=php_openssl.dll

三、下载php_ssh2.dll、php_ssh2.pdb，http://windows.php.net/downloads/pecl/releases/ssh2/0.12/

四、把php_ssh2.dll、php_ssh2.pdb文件放php的ext文件夹

五、重启nginx及php

六、执行cmd，运行：composer -V 能看到版本，表示安装成功