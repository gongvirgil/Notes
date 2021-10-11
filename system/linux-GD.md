Linux下开启PHP的GD库支持

#开启GD库支持有以下几种方法
##检测GD库是否安装命令
 php5 -m | grep -i gd
 或者
 php -i | grep -i --color gd
##如未安装GD库，则为服务器安装，方法如下
### 如果是源码安装，则加入参数
 --with-gd
### 如果是debian系的linux系统，用apt-get安装，如下
 apt-get install php5-gd
### 如果是CentOS系的系统，用yum安装，如下
 yum install php-gd
### 如果是suse系的linux系统，用yast安装，如下
 yast -i php5_gd
### 如果嫌这个世界不够蛋疼呢，可以在原先编译PHP不支持GD的情况下附加
 先下zlib源码，libpng源码，gd源码
 解压后到源码目录
 zlib目录
 ./configure --prefix=/usr/local/zlib
 make ; make install
 make clean
 libpng目录
 cp scripts/makefile.linux ./makefile
 ./configure --prefix=/usr/local/libpng
 make ; make install
 make clean
 gd目录
 ./configure --prefix=/usr/local/libgd --with-png=/usr/local/libpng
 make ; make install
 make clean
 最后在php.ini中，搜到[gd]后，在下面加一行
 extension=/usr/local/libgdgd.so
 然后重启php服务，如果不行，试试reboot

 好了，不过最后提醒一下，要知道这个世界很多意外的，源码安装，只添加gd库这一个情况下，PHP版本和库的版本各异，所以：
 - 不保证这么付出了这么多后有回报
 - 不保证能够成功加载gd.so
 - 不保证不怀孕

 所以如果是源码安装，最好还是在编译PHP的时候加参数--with-gd

Windows下开启PHP的GD库支持

找到php.ini，打开内容，找到：

;extension=php_gd2.dll

把最前面的分号“;”去掉，再保存即可，如果本来就没有分号，那就是已经开启了。

##安装完毕后
**请查看，AKCMS后台/index.php?file=welcome&action=phpmodules或者PHP探针，GD库是否安装成功**