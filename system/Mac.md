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

## 挂载远端服务器到本地

安装homebrew
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
安装sshfs
brew install sshfs
发现报错了，丢失了osxfuse,先安装osxfuse(已安装请忽略)

brew install Caskroom/cask/osxfuse
在重新安装sshfs

使用sshfs挂载远端目录到本地
sshfs -C -o reconnect user@hostname:remote_dir local_dir
user 远程连接用户名
hostname 远程连接的主机名
remote_dir 远程目录
local_dir 本地目录

如果ssh的端口不是是22，加上-p xxx

之后你就可以去你的目录下看看是否挂载成功了,这样你就可以用本地编辑器打开敲写代码了，说明一下，你还可以用本地的软件，比如npm

相关问题
当我们的 mac 网络断开或者休眠或重启, 回来时发现挂载的失败了, 进入目录会提示

$ls local_dir 
ls: local_dir: Input/output error
如果我们想取消挂载, 又会提示

$umount local_dir
umount: local_dir: not currently mounted
这个时候, 我们不得不关闭进程了, 可以先通过命令查看进程

pgrep -lf sshfs
然后杀掉相应的挂载进程, 或者直接杀掉所有挂载进程

pkill -9 sshfs 
之后重新挂载响应的目录即可

## 本地PHP

// 开启Apache服务
sudo apachectl start
// 查看Apache版本号
sudo apachectl -v

前往 /etc/apache2/
找到httpd.conf配置文件


## 关闭homebrew自动更新

当我们在mac下使用brew安装软件时，默认每次都会自动更新homebrew，显示
Updating Homebrew...，网络状况不好或者没有换源的时候，很慢，会卡在这里许久不动。
我们可以关闭自动更新，在命令行执行：

export HOMEBREW_NO_AUTO_UPDATE=true
即可关闭自动更新。

如果想要重启后设置依然生效，可以把上面这行加入到当前正在使用的shell的配置文件中，比如我正在使用的是zsh，那么执行以下语句：

vi ~/.zshrc
然后在合适的位置，加入上面那一行配置。

## 关闭Mac的Rootless机制

El Capitan 加入了Rootless机制，不再能够随心所欲的读写很多路径下了。设置 root 权限也不行。

Rootless机制将成为对抗恶意程序的最后防线

于是尝试关闭 Rootless。重启按住 Command+R，进入恢复模式，打开Terminal。

csrutil disable
重启即可。如果要恢复默认，那么

csrutil enable
附录:
csrutil命令参数格式：

csrutil enable [--without kext | fs | debug | dtrace | nvram][--no-internal]

禁用：csrutil disable

（等同于csrutil enable --without kext --without fs --without debug --without dtrace --without nvram）

其中各个开关，意义如下：

B0: [kext] 允许加载不受信任的kext（与已被废除的kext-dev-mode=1等效）
B1: [fs] 解锁文件系统限制
B2: [debug] 允许task_for_pid()调用
B3: [n/a] 允许内核调试 （官方的csrutil工具无法设置此位）
B4: [internal] Apple内部保留位（csrutil默认会设置此位，实际不会起作用。设置与否均可）
B5: [dtrace] 解锁dtrace限制
B6: [nvram] 解锁NVRAM限制
B7: [n/a] 允许设备配置（新增，具体作用暂时未确定）