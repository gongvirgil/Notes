# Mac

## 常用快捷键

* 新建文件夹：Shift+Command+N
* 窗口最大化和取消最大化：Command + control + F
* Finder显示全部隐藏文件: command + shift + .

使用快捷键 Command+M，可以实现快速最小化当前窗口的目的。

使用快捷键 Command+Option+M，可以实现快速最小化当前应用程序所有窗口的目的。比如你想一下子最小化多个 Finder 窗口，就可以用该快捷键。

使用快捷键 Command+H，可以实现快速隐藏当前应用程序所有窗口的目的。

使用快捷键 Command+Option+H，可以实现快速隐藏除当前应用程序之外所有程序窗口的目的。

使用快捷键 Command+Option+M+H，可以实现快速隐藏所有应用程序窗口的目的。

## 环境变量

* a. /etc/profile 
* b. /etc/paths 
* c. ~/.bash_profile 
* d. ~/.bash_login 
* e. ~/.profile 
* f. ~/.bashrc 

其中a和b是系统级别的，系统启动就会加载，其余是用户接别的。
c,d,e按照从前往后的顺序读取，如果c文件存在，则后面的几个文件就会被忽略不读了，以此类推。~/.bashrc没有上述规则，它是bash shell打开的时候载入的。这里建议在c中添加环境变量

作者：二妹是只猫
链接：https://www.jianshu.com/p/463244ec27e3
来源：简书
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。

## terminal常用命令

Mac 终端里神秘的 bogon 及解决方法

如题，Mac 下的终端经常有时候前面的计算机名会错误的显示成 bogon. 这是因为终端会先向 DNS 请求查询当前 IP 的反向域名解析的结果，如果查询不到再显示我们设置的计算机名。而由于我们的 DNS 错误地将保留地址反向的 NS 查询结果返回了 bogon. 其中 bogon 本应该用来指虚假的 IP 地址，而非保留 IP 地址。因此就出现了会时不时地打印 bogon 这种奇怪名字作为计算机名的现象了。那么如何让终端只显示我们想要的计算机名而不总是从 DNS 返回结果呢？

解决方案：
在终端中执行以下命令即可（需要输入一次管理员密码）
sudo hostname your-desired-host-name
sudo scutil --set LocalHostName $(hostname)
sudo scutil --set HostName $(hostname)

### 远程登录Linux服务器

```
	ssh -p port user@domain
```

### 修改host

```
	sudo vi/etc/hosts
```

### alias

```
	vim ~/.bash_profile
	alias name='cd ~/Notes'
	source ~/.bash_profile
```

## automator
	sudo vi /etc/hosts
