# Ubuntu

## 安装Ubuntu

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